@extends('layouts.front')

@section('title')
    Diserv
@endsection

@section('content')
    @include('layouts.inc.slider')
   
    <section class="section-name  padding-y-sm">
      <div class="container">
      
      <header class="section-heading">
        <h3 class="section-title">Term & Conditions</h3>
      </header><!-- sect-heading -->
  
      <p class="text-justify">Selamat datang di website Diserv. Silahkan membaca Syarat Penggunaan ini dengan seksama. Syarat Penggunaan ini mengatur penggunaan dan akses Platform (di definisikan di bawah) dan penggunaan layanan (di definisikan di bawah). Dengan mengakses Platform dan menggunakan Layanan, Anda setuju untuk terikat dengan Syarat Penggunaan ini. Jika Anda tidak menyetujui Syarat Penggunaan ini, maka Anda jangan/berhenti mengakses dan/atau menggunakan Platform atau Layanan ini.
        Akses atas password dan penggunaan password dilindungi dan/atau area tertentu yang diterlindungi pada Platform dan/atau penggunaan Layanan dibatasi hanya untuk Pelanggan yang memiliki akun saja. Anda tidak diperbolehkan memperoleh atau berusaha memperoleh akses tidak sah ke area Platform dan/atau Layanan ini, atau ke area informasi lain yang dilindungi, dengan cara apapun yang tanpa ijin penggunaan khusus oleh kami. Pelanggaran terhadap ketentuan ini merupakan pelanggaran yang didasarkan pada hukum Indonesia dan/atau undang-undang dan peraturan yang berlaku.</p>

        <img src="{{ asset('/frontend/images/content/tnc-dummy.png') }}" alt="">
      <!-- container // -->
      </section>
@endsection