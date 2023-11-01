@php
$nama = "Fathan";
$nilai = 70;
@endphp

@if ($nilai >= 60) @php $ket = "lulus"; @endphp
@else @php $ket = "gagal"; @endphp
@endif

Siswa {{ $nama }} Dengan Nilai {{ $nilai }} Dinyatakan {{ $ket }}