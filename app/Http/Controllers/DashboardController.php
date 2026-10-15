<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Throwable;

class DashboardController extends Controller
{
    public function index(){
        $masterKategori = DB::table('m_kategori')
            ->select('id', 'nama_kategori')
            ->orderBy('id')
            ->get();

        $totalFoto = DB::table('uploaded_file')
            ->where('tipe_file', 'photo')
            ->count('id');

        $totalVideo = DB::table('uploaded_file')
            ->where('tipe_file', 'video')
            ->count('id');

        $totalKonten = DB::table('uploaded_file')
            ->count('id');
            
        return view('admin.dashboard', compact('masterKategori', 'totalFoto', 'totalVideo', 'totalKonten'));
    }

    /**
     * Memproses upload foto atau video.
     */
    public function upload(Request $request)
    {
        // 1. Validasi input
        $validated = $request->validate([
            'judul' => ['required', 'string', 'max:255'],

            'file' => [
                'required',
                'file',
                'mimes:jpg,jpeg,png,webp,gif,dng,mp4,mov,avi,mkv,webm',
                'max:204800',
            ],

            'kategori_id' => [
                'required',
                'integer',
                'exists:m_kategori,id',
            ],

            'harga' => ['required', 'numeric', 'min:0', 'max:9999999999'],

            'lokasi' => ['required', 'string', 'max:255'],
        ], [
            'judul.required' => 'Judul karya wajib diisi.',
            'judul.max' => 'Judul karya maksimal 255 karakter.',

            'file.required' => 'Pilih foto atau video terlebih dahulu.',
            'file.mimes' => 'Format file tidak didukung.',
            'file.max' => 'Ukuran file maksimal 200 MB.',

            'kategori_id.required' => 'Kategori wajib dipilih.',
            'kategori_id.exists' => 'Kategori yang dipilih tidak ditemukan.',

            'harga.required' => 'Harga lisensi wajib diisi.',
            'harga.min' => 'Harga tidak boleh negatif.',

            'lokasi.required' => 'Lokasi pengambilan wajib diisi.',
            'lokasi.integer' => 'Lokasi harus berupa ID angka.',
        ]);

        $file = $request->file('file');

        // 2. Tentukan jenis file otomatis
        $mimeType = $file->getMimeType();

        if (str_starts_with($mimeType, 'image/')) {
            $tipeFile = 'photo';
        } elseif (str_starts_with($mimeType, 'video/')) {
            $tipeFile = 'video';
        } else {
            return back()
                ->withErrors([
                    'file' => 'File harus berupa foto atau video.',
                ])
                ->withInput();
        }

        // 3. Simpan file ke storage/app/public/uploaded-karya
        $path = $file->store('uploaded-karya', 'public');

        if (!$path) {
            return back()
                ->withErrors([
                    'file' => 'File gagal disimpan. Silakan coba kembali.',
                ])
                ->withInput();
        }

        try {
            // 4. Simpan metadata ke database
            DB::table('uploaded_file')->insert([
                'tipe_file' => $tipeFile,
                'judul_karya' => $validated['judul'],
                'dokumen' => $path,
                'kategori_id' => $validated['kategori_id'],
                'harga' => $validated['harga'],
                'lokasi_pengambilan' => $validated['lokasi'],

                'created_date' => now(),
                'created_by' => (string) auth()->id(),

                'updated_date' => now(),
                'updated_by' => (string) auth()->id(),
            ]);
        } catch (Throwable $e) {
            // Hapus file jika penyimpanan database gagal
            Storage::disk('public')->delete($path);

            report($e);

            return back()
                ->with('error', 'Data gagal disimpan. Periksa struktur tabel dan konfigurasi database.')
                ->withInput();
        }

        // 5. Kembali ke dashboard dengan notifikasi sukses
        return redirect()
            ->route('admin.dashboard')
            ->with('success', 'Karya berhasil diunggah!');
    }

    public function kelolaGaleri()
    {
        $masterKategori = DB::table('m_kategori')
            ->select('id', 'nama_kategori')
            ->orderBy('nama_kategori')
            ->get();

        $galeri = DB::table('uploaded_file')
            ->join(
                'm_kategori',
                'uploaded_file.kategori_id',
                '=',
                'm_kategori.id'
            )
            ->select(
                'uploaded_file.id',
                'uploaded_file.tipe_file',
                'uploaded_file.judul_karya',
                'uploaded_file.dokumen',
                'uploaded_file.kategori_id',
                'uploaded_file.harga',
                'uploaded_file.lokasi_pengambilan',
                'm_kategori.nama_kategori'
            )
            ->orderByDesc('uploaded_file.id')
            ->get()
            ->map(function ($item) {
                $item->url = asset('storage/' . $item->dokumen);
                return $item;
            });

        $totalFoto = DB::table('uploaded_file')
            ->where('tipe_file', 'photo')
            ->count();

        $totalVideo = DB::table('uploaded_file')
            ->where('tipe_file', 'video')
            ->count();

        $totalKonten = DB::table('uploaded_file')->count();

        return view('admin.kelola-galeri', compact(
            'masterKategori',
            'galeri',
            'totalFoto',
            'totalVideo',
            'totalKonten'
        ));
    }

    public function update(Request $request, int $id)
    {
        $konten = DB::table('uploaded_file')
            ->where('id', $id)
            ->first();

        if (!$konten) {
            return back()->with('error', 'Konten tidak ditemukan.');
        }

        $validated = $request->validate([
            'tipeFile' => ['required', Rule::in(['photo', 'video'])],
            'judul' => ['required', 'string', 'max:255'],
            'kategori_id' => [
                'required',
                'integer',
                'exists:m_kategori,id'
            ],
            'harga' => ['required', 'numeric', 'min:0'],
            'lokasi' => ['required', 'string', 'max:255'],
            'file' => [
                'nullable',
                'file',
                'mimes:jpg,jpeg,png,webp,gif,mp4,mov,avi,mkv,webm',
                'max:204800'
            ],
        ]);

        // Kalau upload file baru, tipenya harus sesuai pilihan.
        if ($request->hasFile('file')) {
            $mime = $request->file('file')->getMimeType();

            if (
                ($validated['tipeFile'] === 'photo' &&
                    !Str::startsWith($mime, 'image/')) ||
                ($validated['tipeFile'] === 'video' &&
                    !Str::startsWith($mime, 'video/'))
            ) {
                return back()
                    ->withErrors(['file' => 'Tipe file tidak sesuai pilihan.'])
                    ->withInput();
            }
        }

        $fileBaru = null;

        try {
            // Simpan file baru terlebih dahulu jika dipilih.
            if ($request->hasFile('file')) {
                $fileBaru = $request->file('file')
                    ->store('uploaded-karya', 'public');
            }

            $dataUpdate = [
                'tipe_file' => $validated['tipeFile'],
                'judul_karya' => $validated['judul'],
                'kategori_id' => $validated['kategori_id'],
                'harga' => $validated['harga'],
                'lokasi_pengambilan' => $validated['lokasi'],
                'updated_date' => now(),
                'updated_by' => (string) auth()->id(),
            ];

            if ($fileBaru !== null) {
                $dataUpdate['dokumen'] = $fileBaru;
            }

            DB::table('uploaded_file')
                ->where('id', $id)
                ->update($dataUpdate);

            // Hapus file lama hanya setelah database berhasil diupdate.
            if (
                $fileBaru !== null &&
                $konten->dokumen !== $fileBaru
            ) {
                Storage::disk('public')->delete($konten->dokumen);
            }

            return redirect()
                ->route('admin.kelola-galeri')
                ->with('success', 'Konten berhasil diperbarui.');

        } catch (Throwable $e) {
            if ($fileBaru !== null) {
                Storage::disk('public')->delete($fileBaru);
            }

            Log::error('Gagal update konten galeri', [
                'konten_id' => $id,
                'pesan' => $e->getMessage(),
                'file' => $e->getFile(),
                'baris' => $e->getLine(),
                'exception' => $e,
            ]);

            return back()->withInput()->with(
                'error',
                'Gagal memperbarui konten. Periksa storage/logs/laravel.log.'
            );
        }
    }

    public function destroy(int $id)
    {
        $konten = DB::table('uploaded_file')
            ->where('id', $id)
            ->first();

        if (!$konten) {
            return redirect()
                ->route('admin.kelola-galeri')
                ->with('error', 'Konten tidak ditemukan.');
        }

        try {
            // Hapus record dari database.
            DB::table('uploaded_file')
                ->where('id', $id)
                ->delete();

            // Lalu hapus file fisiknya.
            if ($konten->dokumen) {
                Storage::disk('public')->delete($konten->dokumen);
            }

            return redirect()
                ->route('admin.kelola-galeri')
                ->with('success', 'Konten dan file berhasil dihapus permanen.');

        } catch (Throwable $e) {
            report($e);

            return redirect()
                ->route('admin.kelola-galeri')
                ->with(
                    'error',
                    'Penghapusan gagal. Periksa log Laravel dan status file storage.'
                );
        }
    }
}
