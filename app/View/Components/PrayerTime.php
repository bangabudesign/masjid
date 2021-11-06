<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Http;

class PrayerTime extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $tanggal = Http::get('http://api.flagodna.com/hijriyah/api/'.date('d-m-Y'))->object();
        $jadwal = Http::get('https://api.myquran.com/v1/sholat/jadwal/2113/'.date('Y').'/'.date('m').'/'.date('d'))->object();

        $tanggal_masehi = $tanggal[0]->tanggal_masehi.' '.$tanggal[0]->bulan_masehi.' '.$tanggal[0]->tahun_masehi.' H';
        $tanggal_hijriyah = $tanggal[0]->tanggal_hijriyah.' '.$tanggal[0]->bulan_hijriyah.' '.$tanggal[0]->tahun_hijriyah.' M';
        $jadwal_sholat = $jadwal->data->jadwal;

        return view('components.prayer-time',[
            'tanggal_masehi' => $tanggal_masehi,
            'tanggal_hijriyah' => $tanggal_hijriyah,
            'lokasi' => $jadwal->data->lokasi,
            'tanggal' => $jadwal_sholat->tanggal,
            'imsak' => $jadwal_sholat->imsak,
            'subuh' => $jadwal_sholat->subuh,
            'terbit' => $jadwal_sholat->terbit,
            'dhuha' => $jadwal_sholat->dhuha,
            'dzuhur' => $jadwal_sholat->dzuhur,
            'ashar' => $jadwal_sholat->ashar,
            'maghrib' => $jadwal_sholat->maghrib,
            'isya' => $jadwal_sholat->isya,
            'date' => $jadwal_sholat->date
        ]);
    }
}
