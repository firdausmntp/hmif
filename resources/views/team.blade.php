@extends('layouts.app')

@section('content')
<style>
    .department-card {
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      transform-origin: center;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }
    .department-card:hover {
      transform: translateY(-8px) scale(1.02);
      box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    .nav-dots .dot {
      transition: all 0.3s ease;
    }
    .nav-dots .dot.active {
      width: 2rem;
    }
    .torn-paper-top {
      background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 300 20' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M0,20 L0,0 C25,6 50,10 75,5 C100,0 125,8 150,15 C175,20 200,15 225,10 C250,5 275,10 300,15 L300,20 Z' fill='white'/%3E%3C/svg%3E");
      background-repeat: no-repeat;
      background-size: 100% 100%;
    }
    .torn-paper-bottom {
      background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 300 20' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M0,0 L0,20 C25,14 50,10 75,15 C100,20 125,12 150,5 C175,0 200,5 225,10 C250,15 275,10 300,5 L300,0 Z' fill='white'/%3E%3C/svg%3E");
      background-repeat: no-repeat;
      background-size: 100% 100%;
    }
    /* Add a subtle shine effect on hover */
    .department-card::after {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 50%;
      height: 100%;
      background: linear-gradient(
        to right,
        rgba(255, 255, 255, 0) 0%,
        rgba(255, 255, 255, 0.3) 50%,
        rgba(255, 255, 255, 0) 100%
      );
      transform: skewX(-25deg);
      transition: 0.75s;
    }
    .department-card:hover::after {
      left: 150%;
    }
  </style>
</head>
<body class="bg-gray-100">

<div class="max-w-7xl mx-auto px-4 py-12">
  <!-- Header Section -->
  <div class="text-center mb-16">
    <h1 class="text-4xl font-bold text-[#0077CC] mb-2">HIMAIF 2024</h1>
    <div class="w-32 h-1 bg-[#0077CC] mx-auto mb-6 rounded-full"></div>
    <p class="max-w-3xl mx-auto text-gray-700">Himpunan Mahasiswa Informatika menghadirkan berbagai divisi yang bekerja sama untuk memberikan kontribusi positif bagi mahasiswa jurusan Informatika.</p>
  </div>

  <!-- Leader & Co Leader CARD -->
  <div class="department-card bg-white rounded-xl overflow-hidden shadow-lg mb-8">
    <div class="bg-[#2a4d69] relative overflow-hidden">
      <div class="torn-paper-top h-8"></div>
      <div class="bg-[#2a4d69] px-6 py-8">
        <h3 class="text-3xl text-white font-bold text-center uppercase tracking-wider drop-shadow-md mb-6">
          <span class="block text-xl mb-1">KETUA DAN WAKIL</span>
          HIMPUNAN
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <!-- Ketua Card -->
          <div class="relative flex flex-col items-center">
            <img src="{{asset('images/about/sc/ketua.png')}}" alt="Ketua HMIF" class="w-full object-cover rounded-lg shadow-xl border-4 border-white mb-4">
            <div class="bg-gray-800/80 text-white px-4 py-2 rounded-md text-center backdrop-blur-sm min-w-[120px] w-full">
              <p class="font-bold">Dicky Saputra</p>
              <p class="text-sm">Ketua HMIF</p>
            </div>
          </div>
          <!-- Wakil Ketua Card -->
          <div class="relative flex flex-col items-center">
            <img src="{{asset('images/about/sc/wakil.png')}}" alt="Wakil HMIF" class="w-full object-cover rounded-lg shadow-xl border-4 border-white mb-4">
            <div class="bg-gray-800/80 text-white px-4 py-2 rounded-md text-center backdrop-blur-sm min-w-[120px] w-full">
              <p class="font-bold">Aryo Yonatan</p>
              <p class="text-sm">Wakil HMIF</p>
            </div>
          </div>
        </div>
      </div>
      <div class="torn-paper-bottom h-8"></div>
    </div>
    <div class="px-6 py-4">
      <div class="flex flex-wrap justify-between items-center">
        <div>
          <h4 class="text-xl font-bold text-gray-800">Ketua & Wakil HMIF</h4>
          <p class="text-gray-600">Periode 2024</p>
        </div>
        <div class="flex gap-4 items-center mt-4 sm:mt-0">
          <div class="flex items-center text-gray-700 bg-gray-100 px-4 py-2 rounded-full shadow-sm">
            <i class="fas fa-user-friends mr-2 text-[#0077CC]"></i>
            <span>2 Anggota</span>
          </div>
          <a href="#" class="inline-flex items-center text-white bg-[#0077CC] px-4 py-2 rounded-full shadow-sm hover:bg-[#00619e] transition">
            <i class="fas fa-info-circle mr-2"></i>
            <span>Detail</span>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Department Navigation -->
  <div class="flex flex-wrap justify-center gap-3 mb-12">
    <button class="department-nav-btn px-6 py-2.5 bg-white text-[#0077CC] border border-[#0077CC] font-medium rounded-lg shadow-md hover:bg-blue-50 transition-colors" data-target="bph">
      BPH
    </button>
    <button class="department-nav-btn px-6 py-2.5 bg-white text-[#0077CC] border border-[#0077CC] font-medium rounded-lg shadow-md hover:bg-blue-50 transition-colors" data-target="sc">
      SC
    </button>
    <button class="department-nav-btn px-6 py-2.5 bg-white text-[#0077CC] border border-[#0077CC] font-medium rounded-lg shadow-md hover:bg-blue-50 transition-colors" data-target="kominfo">
      Kominfo
    </button>
    <button class="department-nav-btn px-6 py-2.5 bg-white text-[#0077CC] border border-[#0077CC] font-medium rounded-lg shadow-md hover:bg-blue-50 transition-colors" data-target="mikat">
      Minat & Bakat
    </button>
    <button class="department-nav-btn px-6 py-2.5 bg-white text-[#0077CC] border border-[#0077CC] font-medium rounded-lg shadow-md hover:bg-blue-50 transition-colors" data-target="rnd">
      Research & Development
    </button>
    <button class="department-nav-btn px-6 py-2.5 bg-white text-[#0077CC] border border-[#0077CC] font-medium rounded-lg shadow-md hover:bg-blue-50 transition-colors" data-target="internal">
      Internal
    </button>
    <button class="department-nav-btn px-6 py-2.5 bg-white text-[#0077CC] border border-[#0077CC] font-medium rounded-lg shadow-md hover:bg-blue-50 transition-colors" data-target="eksternal">
      Eksternal
    </button>
    <button class="department-nav-btn px-6 py-2.5 bg-white text-[#0077CC] border border-[#0077CC] font-medium rounded-lg shadow-md hover:bg-blue-50 transition-colors" data-target="kaderisasi">
      Kaderisasi
    </button>
  </div>

  <!-- Department Sections -->
  <div class="department-sections">
    @include('team.bph')
    @include('team.sc')
    @include('team.kominfo')
    @include('team.mikat')
    @include('team.rnd')
    @include('team.internal')
    @include('team.eksternal')
    @include('team.kaderisasi')
  </div>
</div>
<script>
  // JavaScript to handle department navigation toggle
  const navButtons = document.querySelectorAll('.department-nav-btn');
  const sections = document.querySelectorAll('.department-section');

  navButtons.forEach(button => {
    button.addEventListener('click', () => {
      const targetId = button.getAttribute('data-target');

      sections.forEach(section => {
        section.classList.add('hidden');
      });
      navButtons.forEach(btn => {
        btn.classList.remove('bg-[#0077CC]', 'text-white', 'active');
        btn.classList.add('bg-white', 'text-[#0077CC]');
      });

      document.getElementById(targetId).classList.remove('hidden');
      button.classList.add('bg-[#0077CC]', 'text-white', 'active');
      button.classList.remove('bg-white', 'text-[#0077CC]');
    });
  });
</script>
@endsection


