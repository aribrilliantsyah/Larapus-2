<?php

use Illuminate\Database\Seeder;
use App\Divisi;
use App\Paket;
use App\Pengambilan;

class DivisisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $divisi1=Divisi::create(['nama'=>'DIV. PAM&PENGELOLAAN ASET']);
        $divisi2=Divisi::create(['nama'=>'DIT UTAMA']);
        $divisi3=Divisi::create(['nama'=>'DIT KEUANGAN & KINERJA']);
        $divisi4=Divisi::create(['nama'=>'DIT BISNIS PRODUK HANKAM']);
        $divisi5=Divisi::create(['nama'=>'DIT BISNIS PROD INDUSTRIAL']);
        $divisi6=Divisi::create(['nama'=>'DIT TEKNOLOGI & SUPPLY']);
        $divisi7=Divisi::create(['nama'=>'SEKRETARIS PERUSAHAAN']);
        $divisi8=Divisi::create(['nama'=>'SATUAN PENGAWASAN INTERNAL']);
        $divisi9=Divisi::create(['nama'=>'DIV. REN & KIN PERUSAHAAN']);
        $divisi10=Divisi::create(['nama'=>'DIV. AKUNTANSI & KEUANGAN']);
        $divisi11=Divisi::create(['nama'=>'DIV. HC & BANG ORG']);
        $divisi12=Divisi::create(['nama'=>'DIV. SENJATA']);
        $divisi13=Divisi::create(['nama'=>'DIV. AMUNISI']);
        $divisi14=Divisi::create(['nama'=>'DIV. ALAT BERAT']);
        $divisi15=Divisi::create(['nama'=>'DIV. KENDARAAN KHUSUS']);
        $divisi16=Divisi::create(['nama'=>'DIV. BISNIS INDUSTRIAL']);
        $divisi17=Divisi::create(['nama'=>'DIV. TC & AP']);
        $divisi18=Divisi::create(['nama'=>'DIV. HANDAKKOM']);
        $divisi19=Divisi::create(['nama'=>'DIV. TEKNOLOGI & BANG']);
        $divisi20=Divisi::create(['nama'=>'DIV. QA & K3LH']);
        $divisi21=Divisi::create(['nama'=>'DIV. SUPPLY CHAIN']);
        $divisi22=Divisi::create(['nama'=>'DIV. BISNIS HANKAM']);
        $divisi23=Divisi::create(['nama'=>'DIV. SISTEM INFORMASI MNJ']);

        $paket1=Paket::create(['nama'=>'Nopi Latipah', 'divisi_id'=>$divisi1->id, 'pengirim'=>'Risma Yulianti','telpon'=>'082129095090']);
        $paket2=Paket::create(['nama'=>'Rahmat Hidayat', 'divisi_id'=>$divisi1->id, 'pengirim'=>'Risma Yulianti','telpon'=>'082129095090']);
        $paket3=Paket::create(['nama'=>'Syifa Fauziah', 'divisi_id'=>$divisi1->id, 'pengirim'=>'Risma Yulianti','telpon'=>'082129095090']);
        $paket4=Paket::create(['nama'=>'Ryani Anggraeni', 'divisi_id'=>$divisi1->id, 'pengirim'=>'Risma Yulianti','telpon'=>'082129095090']);

        Pengambilan::create(['paket_id'=>$paket1->id,'divisi_id'=>$divisi1->id, 'diambil'=>0]);
        Pengambilan::create(['paket_id'=>$paket2->id,'divisi_id'=>$divisi1->id, 'diambil'=>0]);
        Pengambilan::create(['paket_id'=>$paket3->id,'divisi_id'=>$divisi1->id, 'pengambil'=>'Syifa', 'diambil'=>1]);
        Pengambilan::create(['paket_id'=>$paket4->id,'divisi_id'=>$divisi1->id, 'pengambil'=>'Messi', 'diambil'=>1]);
    }
}
