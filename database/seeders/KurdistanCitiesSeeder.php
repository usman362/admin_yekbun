<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KurdistanCitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bakurCities = [
            [
                'zipcode' => '10100',
                'city' =>    'Afşîn',
            ],
            [
                'zipcode' => '10200',
                'city' =>    'Agirî',
            ],
            [
                'zipcode' => '10300',
                'city' =>    'Aldûş',
            ],
            [
                'zipcode' => '10400',
                'city' =>    'Andirin',
            ],
            [
                'zipcode' => '10500',
                'city' =>    'Arende',
            ],
            [
                'zipcode' => '10600',
                'city' =>    'Arga (Arxa)',
            ],
            [
                'zipcode' => '10700',
                'city' =>    'Arguwan',
            ],
            [
                'zipcode' => '10800',
                'city' =>    'Artemêt',
            ],
            [
                'zipcode' => '10900',
                'city' =>    'Arxa',
            ],
            [
                'zipcode' => '11000',
                'city' =>    'Aşqele',
            ],
            [
                'zipcode' => '11100',
                'city' =>    'Avkevir',
            ],
            [
                'zipcode' => '11200',
                'city' =>    'Avnîk',
            ],
            [
                'zipcode' => '11300',
                'city' =>    'Avşîn',
            ],
            [
                'zipcode' => '11400',
                'city' =>    'Axin',
            ],
            [
                'zipcode' => '11500',
                'city' =>    'Axvanîs',
            ],
            [
                'zipcode' => '11600',
                'city' =>    'Aywalî',
            ],
            [
                'zipcode' => '11700',
                'city' =>    'Azarpêrt',
            ],
            [
                'zipcode' => '11800',
                'city' =>    'Azort',
            ],
            [
                'zipcode' => '11900',
                'city' =>    'Bajêrgeh',
            ],
            [
                'zipcode' => '12000',
                'city' =>    'Bardîz',
            ],
            [
                'zipcode' => '12100',
                'city' =>    'Basan',
            ],
            [
                'zipcode' => '12200',
                'city' =>    'Basê',
            ],
            [
                'zipcode' => '12300',
                'city' =>    'Baskîl',
            ],
            [
                'zipcode' => '12400',
                'city' =>    'Başan',
            ],
            [
                'zipcode' => '12500',
                'city' =>    'Bazarcix',
            ],
            [
                'zipcode' => '12600',
                'city' =>    'Bazîd',
            ],
            [
                'zipcode' => '12700',
                'city' =>    'Bazîdaxa',
            ],
            [
                'zipcode' => '12800',
                'city' =>    'Berwarî',
            ],
            [
                'zipcode' => '12900',
                'city' =>    'Bêgirî',
            ],
            [
                'zipcode' => '13000',
                'city' =>    'Bêhiştî',
            ],
            [
                'zipcode' => '13100',
                'city' =>    'Bêlqis',
            ],
            [
                'zipcode' => '13200',
                'city' =>    'Bêrecûk',
            ],
            [
                'zipcode' => '13300',
                'city' =>    'Bêsnî',
            ],
            [
                'zipcode' => '13400',
                'city' =>    'Bidlîs',
            ],
            [
                'zipcode' => '13500',
                'city' =>    'Bilekan',
            ],
            [
                'zipcode' => '13600',
                'city' =>    'Bismîl',
            ],
            [
                'zipcode' => '13700',
                'city' =>    'Bongilan',
            ],
            [
                'zipcode' => '13800',
                'city' =>    'Cela',
            ],
            [
                'zipcode' => '13900',
                'city' =>    'Cerîd',
            ],
            [
                'zipcode' => '14000',
                'city' =>    'Cilawûz',
            ],
            [
                'zipcode' => '14100',
                'city' =>    'Ciminî',
            ],
            [
                'zipcode' => '14200',
                'city' =>    'Cizîr',
            ],
            [
                'zipcode' => '14300',
                'city' =>    'Colemêrg',
            ],
            [
                'zipcode' => '14400',
                'city' =>    'Curnê Reş',
            ],
            [
                'zipcode' => '14500',
                'city' =>    'Çat',
            ],
            [
                'zipcode' => '14600',
                'city' =>    'Çelê',
            ],
            [
                'zipcode' => '14700',
                'city' =>    'Çemişgezek',
            ],
            [
                'zipcode' => '14800',
                'city' =>    'Çermiktî',
            ],
            [
                'zipcode' => '14900',
                'city' =>    'Çewlîg',
            ],
            [
                'zipcode' => '15000',
                'city' =>    'Çêlikan',
            ],
            [
                'zipcode' => '15100',
                'city' =>    'Çêrme',
            ],
            [
                'zipcode' => '15200',
                'city' =>    'Çêrmik',
            ],
            [
                'zipcode' => '15300',
                'city' =>    'Çêrmûg',
            ],
            [
                'zipcode' => '15400',
                'city' =>    'Çildar',
            ],
            [
                'zipcode' => '15500',
                'city' =>    'Çinar',
            ],
            [
                'zipcode' => '15600',
                'city' =>    'Çinçin',
            ],
            [
                'zipcode' => '15700',
                'city' =>    'Çirmik',
            ],
            [
                'zipcode' => '15800',
                'city' =>    'Çîlikan',
            ],
            [
                'zipcode' => '15900',
                'city' =>    'Dara Hênî',
            ],
            [
                'zipcode' => '16000',
                'city' =>    'Darende',
            ],
            [
                'zipcode' => '16100',
                'city' =>    'Dep',
            ],
            [
                'zipcode' => '16200',
                'city' =>    'Dêmal',
            ],
            [
                'zipcode' => '16300',
                'city' =>    'Dêrgûl',
            ],
            [
                'zipcode' => '16400',
                'city' =>    'Dêrik',
            ],
            [
                'zipcode' => '16500',
                'city' =>    'Dêrsim',
            ],
            [
                'zipcode' => '16600',
                'city' =>    'Dêrxas',
            ],
            [
                'zipcode' => '16700',
                'city' =>    'Dihê',
            ],
            [
                'zipcode' => '16800',
                'city' =>    'Dinêser (Qosar)',
            ],
            [
                'zipcode' => '16900',
                'city' =>    'Dîgor',
            ],
            [
                'zipcode' => '17000',
                'city' =>    'Dîlok (Entab)',
            ],
            [
                'zipcode' => '17100',
                'city' =>    'Dîvrîgî',
            ],
            [
                'zipcode' => '17200',
                'city' =>    'Dîyarbekir (Amed)',
            ],
            [
                'zipcode' => '17300',
                'city' =>    'Dutax',
            ],
            [
                'zipcode' => '17400',
                'city' =>    'Duxur',
            ],
            [
                'zipcode' => '17500',
                'city' =>    'Edene',
            ],
            [
                'zipcode' => '17600',
                'city' =>    'Elbak',
            ],
            [
                'zipcode' => '17700',
                'city' =>    'Elbistan',
            ],
            [
                'zipcode' => '17800',
                'city' =>    'Elcewaz',
            ],
            [
                'zipcode' => '17900',
                'city' =>    'Elezîz (Xarpêt)',
            ],
            [
                'zipcode' => '18000',
                'city' =>    'Elîyê Mentarê',
            ],
            [
                'zipcode' => '18100',
                'city' =>    'Elkê',
            ],
            [
                'zipcode' => '18200',
                'city' =>    'Erdêxan',
            ],
            [
                'zipcode' => '18300',
                'city' =>    'Erdîş',
            ],
            [
                'zipcode' => '18400',
                'city' =>    'Ereban',
            ],
            [
                'zipcode' => '18500',
                'city' =>    'Erebgir',
            ],
            [
                'zipcode' => '18600',
                'city' =>    'Erxenî',
            ],
            [
                'zipcode' => '18700',
                'city' =>    'Erxevan',
            ],
            [
                'zipcode' => '18800',
                'city' =>    'Erzingan',
            ],
            [
                'zipcode' => '18900',
                'city' =>    'Erzirom',
            ],
            [
                'zipcode' => '19000',
                'city' =>    'Erzîn',
            ],
            [
                'zipcode' => '19100',
                'city' =>    'Ezbider',
            ],
            [
                'zipcode' => '19200',
                'city' =>    'Êgin',
            ],
            [
                'zipcode' => '19300',
                'city' =>    'Êlih (Batman)',
            ],
            [
                'zipcode' => '19400',
                'city' =>    'Farqîn',
            ],
            [
                'zipcode' => '19500',
                'city' =>    'Gemerek',
            ],
            [
                'zipcode' => '19600',
                'city' =>    'Gercan',
            ],
            [
                'zipcode' => '19700',
                'city' =>    'Gever',
            ],
            [
                'zipcode' => '19800',
                'city' =>    'Gêl',
            ],
            [
                'zipcode' => '19900',
                'city' =>    'Gêxî',
            ],
            [
                'zipcode' => '20000',
                'city' =>    'Gimgim',
            ],
            [
                'zipcode' => '20100',
                'city' =>    'Girê Mirad',
            ],
            [
                'zipcode' => '20200',
                'city' =>    'Girê Sor',
            ],
            [
                'zipcode' => '20300',
                'city' =>    'Girkê Amo',
            ],
            [
                'zipcode' => '20400',
                'city' =>    'Gîyadîn',
            ],
            [
                'zipcode' => '20500',
                'city' =>    'Gogsî',
            ],
            [
                'zipcode' => '20600',
                'city' =>    'Goksun',
            ],
            [
                'zipcode' => '20700',
                'city' =>    'Golan',
            ],
            [
                'zipcode' => '20800',
                'city' =>    'Golbaşî',
            ],
            [
                'zipcode' => '20900',
                'city' =>    'Gurgum',
            ],
            [
                'zipcode' => '21000',
                'city' =>    'Gurin',
            ],
            [
                'zipcode' => '21100',
                'city' =>    'Hafik',
            ],
            [
                'zipcode' => '21200',
                'city' =>    'Harûniye',
            ],
            [
                'zipcode' => '21300',
                'city' =>    'Hawêl',
            ],
            [
                'zipcode' => '21400',
                'city' =>    'Hekîmxan',
            ],
            [
                'zipcode' => '21500',
                'city' =>    'Heran',
            ],
            [
                'zipcode' => '21600',
                'city' =>    'Hesenqela',
            ],
            [
                'zipcode' => '21700',
                'city' =>    'Heskîf',
            ],
            [
                'zipcode' => '21800',
                'city' =>    'Hewag',
            ],
            [
                'zipcode' => '21900',
                'city' =>    'Heweng',
            ],
            [
                'zipcode' => '22000',
                'city' =>    'Hewêl',
            ],
            [
                'zipcode' => '22100',
                'city' =>    'Hezex',
            ],
            [
                'zipcode' => '22200',
                'city' =>    'Hezo',
            ],
            [
                'zipcode' => '22300',
                'city' =>    'Hezro',
            ],
            [
                'zipcode' => '22400',
                'city' =>    'Hênê',
            ],
            [
                'zipcode' => '22500',
                'city' =>    'Hîzan',
            ],
            [
                'zipcode' => '22600',
                'city' =>    'Ispenaq',
            ],
            [
                'zipcode' => '22700',
                'city' =>    'Îd',
            ],
            [
                'zipcode' => '22800',
                'city' =>    'Îdir',
            ],
            [
                'zipcode' => '22900',
                'city' =>    'Îliç',
            ],
            [
                'zipcode' => '23000',
                'city' =>    'Îslahîye',
            ],
            [
                'zipcode' => '23100',
                'city' =>    'Îspîr',
            ],
            [
                'zipcode' => '23200',
                'city' =>    'Kamîlava',
            ],
            [
                'zipcode' => '23300',
                'city' =>    'Kangal',
            ],
            [
                'zipcode' => '23400',
                'city' =>    'Kanîreş',
            ],
            [
                'zipcode' => '23500',
                'city' =>    'Kanîya Xezalan',
            ],
            [
                'zipcode' => '23600',
                'city' =>    'Karaz',
            ],
            [
                'zipcode' => '23700',
                'city' =>    'Karkamiş',
            ],
            [
                'zipcode' => '23800',
                'city' =>    'Keban',
            ],
            [
                'zipcode' => '23900',
                'city' =>    'Keferdîz',
            ],
            [
                'zipcode' => '24000',
                'city' =>    'Kele',
            ],
            [
                'zipcode' => '24100',
                'city' =>    'Kemax',
            ],
            [
                'zipcode' => '24200',
                'city' =>    'Kerboran',
            ],
            [
                'zipcode' => '24300',
                'city' =>    'Kercews',
            ],
            [
                'zipcode' => '24400',
                'city' =>    'Kilîs',
            ],
            [
                'zipcode' => '24500',
                'city' =>    'Koçgirî',
            ],
            [
                'zipcode' => '24600',
                'city' =>    'Koksen',
            ],
            [
                'zipcode' => '24700',
                'city' =>    'Kolik',
            ],
            [
                'zipcode' => '24800',
                'city' =>    'Komirlî',
            ],
            [
                'zipcode' => '24900',
                'city' =>    'Kop',
            ],
            [
                'zipcode' => '25000',
                'city' =>    'Korxol',
            ],
            [
                'zipcode' => '25100',
                'city' =>    'Koyûlhîsar',
            ],
            [
                'zipcode' => '25200',
                'city' =>    'Kozan',
            ],
            [
                'zipcode' => '25300',
                'city' =>    'Kurdoxlî',
            ],
            [
                'zipcode' => '25400',
                'city' =>    'Kurudere',
            ],
            [
                'zipcode' => '25500',
                'city' =>    'Licê',
            ],
            [
                'zipcode' => '25600',
                'city' =>    'Macîran',
            ],
            [
                'zipcode' => '25700',
                'city' =>    'Maden',
            ],
            [
                'zipcode' => '25800',
                'city' =>    'Mansî',
            ],
            [
                'zipcode' => '25900',
                'city' =>    'Matkî',
            ],
            [
                'zipcode' => '26000',
                'city' =>    'Mazgêrd',
            ],
            [
                'zipcode' => '26100',
                'city' =>    'Mehsert',
            ],
            [
                'zipcode' => '26200',
                'city' =>    'Meletî',
            ],
            [
                'zipcode' => '26300',
                'city' =>    'Meletîya Kevn',
            ],
            [
                'zipcode' => '26400',
                'city' =>    'Mereş (Gurgum)',
            ],
            [
                'zipcode' => '26500',
                'city' =>    'Mezmaxor',
            ],
            [
                'zipcode' => '26600',
                'city' =>    'Mêrdîn',
            ],
            [
                'zipcode' => '26700',
                'city' =>    'Mêrdînik',
            ],
            [
                'zipcode' => '26800',
                'city' =>    'Mêrsîn',
            ],
            [
                'zipcode' => '26900',
                'city' =>    'Mêzgir',
            ],
            [
                'zipcode' => '27000',
                'city' =>    'Midyad',
            ],
            [
                'zipcode' => '27100',
                'city' =>    'Miks',
            ],
            [
                'zipcode' => '27200',
                'city' =>    'Milazgir',
            ],
            [
                'zipcode' => '27300',
                'city' =>    'Misirc',
            ],
            [
                'zipcode' => '27400',
                'city' =>    'Misrîç',
            ],
            [
                'zipcode' => '27500',
                'city' =>    'Mîyaran',
            ],
            [
                'zipcode' => '27600',
                'city' =>    'Mose',
            ],
            [
                'zipcode' => '27700',
                'city' =>    'Motkan',
            ],
            [
                'zipcode' => '27800',
                'city' =>    'Mûş',
            ],
            [
                'zipcode' => '27900',
                'city' =>    'Nisêbîn',
            ],
            [
                'zipcode' => '28000',
                'city' =>    'Norgeh',
            ],
            [
                'zipcode' => '28100',
                'city' =>    'Norşîn',
            ],
            [
                'zipcode' => '28200',
                'city' =>    'Norxan',
            ],
            [
                'zipcode' => '28300',
                'city' =>    'Nûrheq',
            ],
            [
                'zipcode' => '28400',
                'city' =>    'Olîlî',
            ],
            [
                'zipcode' => '28500',
                'city' =>    'Oltî',
            ],
            [
                'zipcode' => '28600',
                'city' =>    'Olûr',
            ],
            [
                'zipcode' => '28700',
                'city' =>    'Palo',
            ],
            [
                'zipcode' => '28800',
                'city' =>    'Panos',
            ],
            [
                'zipcode' => '28900',
                'city' =>    'Pasûr',
            ],
            [
                'zipcode' => '29000',
                'city' =>    'Payîzava',
            ],
            [
                'zipcode' => '29100',
                'city' =>    'Pêrtag Qisle',
            ],
            [
                'zipcode' => '29200',
                'city' =>    'Pilemurîye',
            ],
            [
                'zipcode' => '29300',
                'city' =>    'Pirsûs',
            ],
            [
                'zipcode' => '29400',
                'city' =>    'Pîran',
            ],
            [
                'zipcode' => '29500',
                'city' =>    'Posof',
            ],
            [
                'zipcode' => '29600',
                'city' =>    'Pulur',
            ],
            [
                'zipcode' => '29700',
                'city' =>    'Qabilcewz',
            ],
            [
                'zipcode' => '29800',
                'city' =>    'Qamuşan',
            ],
            [
                'zipcode' => '29900',
                'city' =>    'Qaxizman',
            ],
            [
                'zipcode' => '30000',
                'city' =>    'Qela',
            ],
            [
                'zipcode' => '30100',
                'city' =>    'Qelqelî',
            ],
            [
                'zipcode' => '30200',
                'city' =>    'Qenxal',
            ],
            [
                'zipcode' => '30300',
                'city' =>    'Qereçoban',
            ],
            [
                'zipcode' => '30400',
                'city' =>    'Qerequlax',
            ],
            [
                'zipcode' => '30500',
                'city' =>    'Qers',
            ],
            [
                'zipcode' => '30600',
                'city' =>    'Qilaban Silopîya',
            ],
            [
                'zipcode' => '30700',
                'city' =>    'Qisle',
            ],
            [
                'zipcode' => '30800',
                'city' =>    'Qoçgîrî',
            ],
            [
                'zipcode' => '30900',
                'city' =>    'Qolhîsar',
            ],
            [
                'zipcode' => '31000',
                'city' =>    'Qoser',
            ],
            [
                'zipcode' => '31100',
                'city' =>    'Qowancîyan',
            ],
            [
                'zipcode' => '31200',
                'city' =>    'Qubîn',
            ],
            [
                'zipcode' => '31300',
                'city' =>    'Qulp',
            ],
            [
                'zipcode' => '31400',
                'city' =>    'Riha',
            ],
            [
                'zipcode' => '31500',
                'city' =>    'Rişmil',
            ],
            [
                'zipcode' => '31600',
                'city' =>    'Sarîqamîş',
            ],
            [
                'zipcode' => '31700',
                'city' =>    'Sarqişla',
            ],
            [
                'zipcode' => '31800',
                'city' =>    'Sason',
            ],
            [
                'zipcode' => '31900',
                'city' =>    'Selîm',
            ],
            [
                'zipcode' => '32000',
                'city' =>    'Semsat',
            ],
            [
                'zipcode' => '32100',
                'city' =>    'Semsûr',
            ],
            [
                'zipcode' => '32200',
                'city' =>    'Serê Kanîyê',
            ],
            [
                'zipcode' => '32300',
                'city' =>    'Sergolan',
            ],
            [
                'zipcode' => '32400',
                'city' =>    'Sêrt',
            ],
            [
                'zipcode' => '32500',
                'city' =>    'Sêwaz',
            ],
            [
                'zipcode' => '32600',
                'city' =>    'Sêwreg',
            ],
            [
                'zipcode' => '32700',
                'city' =>    'Silopî',
            ],
            [
                'zipcode' => '32800',
                'city' =>    'Sincik',
            ],
            [
                'zipcode' => '32900',
                'city' =>    'Sîvrîce',
            ],
            [
                'zipcode' => '33000',
                'city' =>    'Stewr',
            ],
            [
                'zipcode' => '33100',
                'city' =>    'Sûşehrî',
            ],
            [
                'zipcode' => '33200',
                'city' =>    'Şankuş',
            ],
            [
                'zipcode' => '33300',
                'city' =>    'Şax',
            ],
            [
                'zipcode' => '33400',
                'city' =>    'Şemîzînan',
            ],
            [
                'zipcode' => '33500',
                'city' =>    'Şemrex',
            ],
            [
                'zipcode' => '33600',
                'city' =>    'Şemzînan',
            ],
            [
                'zipcode' => '33700',
                'city' =>    'Şernex',
            ],
            [
                'zipcode' => '33800',
                'city' =>    'Şêrwan',
            ],
            [
                'zipcode' => '33900',
                'city' =>    'Şirnex',
            ],
            [
                'zipcode' => '34000',
                'city' =>    'Şîro',
            ],
            [
                'zipcode' => '34100',
                'city' =>    'Şûrêgel',
            ],
            [
                'zipcode' => '34200',
                'city' =>    'Tatos',
            ],
            [
                'zipcode' => '34300',
                'city' =>    'Tawûsker',
            ],
            [
                'zipcode' => '34400',
                'city' =>    'Tecer',
            ],
            [
                'zipcode' => '34500',
                'city' =>    'Tetwan',
            ],
            [
                'zipcode' => '34600',
                'city' =>    'Têkor',
            ],
            [
                'zipcode' => '34700',
                'city' =>    'Têlî',
            ],
            [
                'zipcode' => '34800',
                'city' =>    'Têrcan',
            ],
            [
                'zipcode' => '34900',
                'city' =>    'Têşberûn',
            ],
            [
                'zipcode' => '35000',
                'city' =>    'Tilo',
            ],
            [
                'zipcode' => '35100',
                'city' =>    'Tixbişar',
            ],
            [
                'zipcode' => '35200',
                'city' =>    'Tîlbîşar',
            ],
            [
                'zipcode' => '35300',
                'city' =>    'Tonus',
            ],
            [
                'zipcode' => '35400',
                'city' =>    'Tortim',
            ],
            [
                'zipcode' => '35500',
                'city' =>    'Tozanî',
            ],
            [
                'zipcode' => '35600',
                'city' =>    'Tût',
            ],
            [
                'zipcode' => '35700',
                'city' =>    'Wan',
            ],
            [
                'zipcode' => '35800',
                'city' =>    'Westan',
            ],
            [
                'zipcode' => '35900',
                'city' =>    'Wêranşar',
            ],
            [
                'zipcode' => '36000',
                'city' =>    'Xamûr',
            ],
            [
                'zipcode' => '36100',
                'city' =>    'Xana Hewêl',
            ],
            [
                'zipcode' => '36200',
                'city' =>    'Xanek',
            ],
            [
                'zipcode' => '36300',
                'city' =>    'Xarpêt',
            ],
            [
                'zipcode' => '36400',
                'city' =>    'Xawesor',
            ],
            [
                'zipcode' => '36500',
                'city' =>    'Xelat',
            ],
            [
                'zipcode' => '36600',
                'city' =>    'Xelfetî',
            ],
            [
                'zipcode' => '36700',
                'city' =>    'Xemûr',
            ],
            [
                'zipcode' => '36800',
                'city' =>    'Xenêk',
            ],
            [
                'zipcode' => '36900',
                'city' =>    'Xinûs (Kela)',
            ],
            [
                'zipcode' => '37000',
                'city' =>    'Xisxêr',
            ],
            [
                'zipcode' => '37100',
                'city' =>    'Xîzan',
            ],
            [
                'zipcode' => '37200',
                'city' =>    'Xorasan',
            ],
            [
                'zipcode' => '37300',
                'city' =>    'Xorxol',
            ],
            [
                'zipcode' => '37400',
                'city' =>    'Xoşab',
            ],
            [
                'zipcode' => '37500',
                'city' =>    'Xozat',
            ],
            [
                'zipcode' => '37600',
                'city' =>    'Xulaman',
            ],
            [
                'zipcode' => '37700',
                'city' =>    'Xûx',
            ],
            [
                'zipcode' => '37800',
                'city' =>    'Yildizelî',
            ],
            [
                'zipcode' => '37900',
                'city' =>    'Zarûşad',
            ],
            [
                'zipcode' => '38000',
                'city' =>    'Zêdikan',
            ],
            [
                'zipcode' => '38100',
                'city' =>    'Zêtka',
            ],
            [
                'zipcode' => '38200',
                'city' =>    'Zûrzûnan',
            ],
        ];
        $basurCities = [
            ['zipcode' => '50100',    'city' => 'Akrê'],
            ['zipcode' => '50200',    'city' => 'Amêdî'],
            ['zipcode' => '50300',    'city' => 'Axçeler'],
            ['zipcode' => '50400',    'city' => 'Baedrê'],
            ['zipcode' => '50500',    'city' => 'Baej'],
            ['zipcode' => '50600',    'city' => 'Bamernê'],
            ['zipcode' => '50700',    'city' => 'Baqûbe'],
            ['zipcode' => '50800',    'city' => 'Bartella'],
            ['zipcode' => '50900',    'city' => 'Başîqa'],
            ['zipcode' => '51000',    'city' => 'Batûfa'],
            ['zipcode' => '51100',    'city' => 'Bazyan'],
            ['zipcode' => '51200',    'city' => 'Bekreco'],
            ['zipcode' => '51300',    'city' => 'Bemû'],
            ['zipcode' => '51400',    'city' => 'Berdereş'],
            ['zipcode' => '51500',    'city' => 'Binesilawe'],
            ['zipcode' => '51600',    'city' => 'Celewla'],
            ['zipcode' => '51700',    'city' => 'Çemçemal'],
            ['zipcode' => '51800',    'city' => 'Çire'],
            ['zipcode' => '51900',    'city' => 'Çiwarqurne'],
            ['zipcode' => '52000',    'city' => 'Çoman'],
            ['zipcode' => '52100',    'city' => 'Çuwarta'],
            ['zipcode' => '52200',    'city' => 'Daqoq'],
            ['zipcode' => '52300',    'city' => 'Darbandîçan'],
            ['zipcode' => '52400',    'city' => 'Darmanawa'],
            ['zipcode' => '52500',    'city' => 'Derbendîxan'],
            ['zipcode' => '52600',    'city' => 'Dêrelûk'],
            ['zipcode' => '52700',    'city' => 'Dibs'],
            ['zipcode' => '52800',    'city' => 'Dihok'],
            ['zipcode' => '52900',    'city' => 'Dîyale'],
            ['zipcode' => '53000',    'city' => 'Dîyana'],
            ['zipcode' => '53100',    'city' => 'Dokan'],
            ['zipcode' => '53200',    'city' => 'Dûz'],
            ['zipcode' => '53300',    'city' => 'Elkîş'],
            ['zipcode' => '53400',    'city' => 'Erbet'],
            ['zipcode' => '53500',    'city' => 'Esker'],
            ['zipcode' => '53600',    'city' => 'Etrûş'],
            ['zipcode' => '53700',    'city' => 'Fayde'],
            ['zipcode' => '53800',    'city' => 'Gilale'],
            ['zipcode' => '53900',    'city' => 'Harîr'],
            ['zipcode' => '54000',    'city' => 'Hecî Umeran'],
            ['zipcode' => '54100',    'city' => 'Hecîler'],
            ['zipcode' => '54200',    'city' => 'Helebçe'],
            ['zipcode' => '54300',    'city' => 'Hemzekor'],
            ['zipcode' => '54400',    'city' => 'Hewîce'],
            ['zipcode' => '54500',    'city' => 'Hewlêr'],
            ['zipcode' => '54600',    'city' => 'Kanîmasê'],
            ['zipcode' => '54700',    'city' => 'Kelar'],
            ['zipcode' => '54800',    'city' => 'Kerkûk'],
            ['zipcode' => '54900',    'city' => 'Kesnezan'],
            ['zipcode' => '55000',    'city' => 'Kifrî'],
            ['zipcode' => '55100',    'city' => 'Koye'],
            ['zipcode' => '55200',    'city' => 'Leylan'],
            ['zipcode' => '55300',    'city' => 'Mangêş'],
            ['zipcode' => '55400',    'city' => 'Mawet'],
            ['zipcode' => '55500',    'city' => 'Mendelî'],
            ['zipcode' => '55600',    'city' => 'Mexmûr'],
            ['zipcode' => '55700',    'city' => 'Mêrgesor'],
            ['zipcode' => '55800',    'city' => 'Mûsil'],
            ['zipcode' => '55900',    'city' => 'Neftxane'],
            ['zipcode' => '56000',    'city' => 'Pêncwên'],
            ['zipcode' => '56100',    'city' => 'Pirdê (Altûnkoprî)'],
            ['zipcode' => '56200',    'city' => 'Pişder'],
            ['zipcode' => '56300',    'city' => 'Pîre Megrun'],
            ['zipcode' => '56400',    'city' => 'Qadirkerem'],
            ['zipcode' => '56500',    'city' => 'Qeladizê'],
            ['zipcode' => '56600',    'city' => 'Qeredax'],
            ['zipcode' => '56700',    'city' => 'Qereqûş'],
            ['zipcode' => '56800',    'city' => 'Qeretû'],
            ['zipcode' => '56900',    'city' => 'Qesir'],
            ['zipcode' => '57000',    'city' => 'Qesrok'],
            ['zipcode' => '57100',    'city' => 'Ranîye'],
            ['zipcode' => '57200',    'city' => 'Rewandiz'],
            ['zipcode' => '57300',    'city' => 'Rizgarî'],
            ['zipcode' => '57400',    'city' => 'Selahedîn'],
            ['zipcode' => '57500',    'city' => 'Sengaw'],
            ['zipcode' => '57600',    'city' => 'Sersing'],
            ['zipcode' => '57700',    'city' => 'Seyîd Sadiq'],
            ['zipcode' => '57800',    'city' => 'Sêmêl'],
            ['zipcode' => '57900',    'city' => 'Silêmanî'],
            ['zipcode' => '58000',    'city' => 'Soran'],
            ['zipcode' => '58100',    'city' => 'Sordaş'],
            ['zipcode' => '58200',    'city' => 'Şakil'],
            ['zipcode' => '58300',    'city' => 'Şarbajêr'],
            ['zipcode' => '58400',    'city' => 'Şarezûr'],
            ['zipcode' => '58500',    'city' => 'Şeqlawe'],
            ['zipcode' => '58600',    'city' => 'Şêxan'],
            ['zipcode' => '58700',    'city' => 'Şingal'],
            ['zipcode' => '58800',    'city' => 'Şûwan'],
            ['zipcode' => '58900',    'city' => 'Tawûq'],
            ['zipcode' => '59000',    'city' => 'Teqteq'],
            ['zipcode' => '59100',    'city' => 'Tesqopa'],
            ['zipcode' => '59200',    'city' => 'Tewêle'],
            ['zipcode' => '59300',    'city' => 'Til Ezer'],
            ['zipcode' => '59400',    'city' => 'Tilehfer'],
            ['zipcode' => '59500',    'city' => 'Tilkêf'],
            ['zipcode' => '59600',    'city' => 'Xaneqîn'],
            ['zipcode' => '59700',    'city' => 'Xebat'],
            ['zipcode' => '59800',    'city' => 'Xelîfan'],
            ['zipcode' => '59900',    'city' => 'Xurmal'],
            ['zipcode' => '60000',    'city' => 'Xurmatû'],
            ['zipcode' => '60100',    'city' => 'Xuylên (Hewîce)'],
            ['zipcode' => '60200',    'city' => 'Zawîte'],
            ['zipcode' => '60300',    'city' => 'Zaxo'],
        ];
        $rojavaCities = [
            ['zipcode' => '70100',    'city' => 'Amûd'],
            ['zipcode' => '70200',    'city' => 'Arfêtê'],
            ['zipcode' => '70300',    'city' => 'Bab'],
            ['zipcode' => '70400',    'city' => 'Bajarê Firat'],
            ['zipcode' => '70500',    'city' => 'Baxoz'],
            ['zipcode' => '70600',    'city' => 'Bozanê'],
            ['zipcode' => '70700',    'city' => 'Cerablûs'],
            ['zipcode' => '70800',    'city' => 'Cindirêsê'],
            ['zipcode' => '70900',    'city' => 'Çilaxa'],
            ['zipcode' => '71000',    'city' => 'Dêre Zor'],
            ['zipcode' => '71100',    'city' => 'Dêrik'],
            ['zipcode' => '71200',    'city' => 'Dêrika Hemko'],
            ['zipcode' => '71300',    'city' => 'Dirbêsî'],
            ['zipcode' => '71400',    'city' => 'Efrîn'],
            ['zipcode' => '71500',    'city' => 'Elbû-kemal'],
            ['zipcode' => '71600',    'city' => 'Erefêt'],
            ['zipcode' => '71700',    'city' => 'Eyndîwer'],
            ['zipcode' => '71800',    'city' => 'Ezaz'],
            ['zipcode' => '71900',    'city' => 'Êndîwer'],
            ['zipcode' => '72000',    'city' => 'Girê Spî'],
            ['zipcode' => '72100',    'city' => 'Girê Xurma (Til Temir)'],
            ['zipcode' => '72200',    'city' => 'Girkê Legê'],
            ['zipcode' => '72300',    'city' => 'Girzîro'],
            ['zipcode' => '72400',    'city' => 'Hecîn'],
            ['zipcode' => '72500',    'city' => 'Heleb'],
            ['zipcode' => '72600',    'city' => 'Heseke (Hesîçe)'],
            ['zipcode' => '72700',    'city' => 'Hisîça'],
            ['zipcode' => '72800',    'city' => 'Hol'],
            ['zipcode' => '72900',    'city' => 'Îdlîb'],
            ['zipcode' => '73000',    'city' => 'Kobanî'],
            ['zipcode' => '73100',    'city' => 'Mabuk'],
            ['zipcode' => '73200',    'city' => 'Meyadîn'],
            ['zipcode' => '73300',    'city' => 'Minbic (Membic, Mabuk)'],
            ['zipcode' => '73400',    'city' => 'Nibil'],
            ['zipcode' => '73500',    'city' => 'Qamîşlo'],
            ['zipcode' => '73600',    'city' => 'Qere qozaq'],
            ['zipcode' => '73700',    'city' => 'Raco'],
            ['zipcode' => '73800',    'city' => 'Reqa'],
            ['zipcode' => '73900',    'city' => 'Rimêlan'],
            ['zipcode' => '74000',    'city' => 'Serê Kanîyê'],
            ['zipcode' => '74100',    'city' => 'Silûk'],
            ['zipcode' => '74200',    'city' => 'Sirîn'],
            ['zipcode' => '74300',    'city' => 'Şedadê'],
            ['zipcode' => '74400',    'city' => 'Şehba'],
            ['zipcode' => '74500',    'city' => 'Tebqa'],
            ['zipcode' => '74600',    'city' => 'Til Birak'],
            ['zipcode' => '74700',    'city' => 'Til Hemîs'],
            ['zipcode' => '74800',    'city' => 'Til Koçer'],
            ['zipcode' => '74900',    'city' => 'Til Rifat'],
            ['zipcode' => '75000',    'city' => 'Til Tişrîn'],
            ['zipcode' => '75100',    'city' => 'Tirbespî'],
            ['zipcode' => '75200',    'city' => 'Xemilîn (Laziqiye)'],
        ];
        $rojhilatCities = [
            ['zipcode' => '90100', 'city' => 'Abdanan'],
            ['zipcode' => '90200', 'city' => 'Arwînawa'],
            ['zipcode' => '90300', 'city' => 'Bane'],
            ['zipcode' => '90400', 'city' => 'Biradost'],
            ['zipcode' => '90500', 'city' => 'Bîcar'],
            ['zipcode' => '90600', 'city' => 'Bokan'],
            ['zipcode' => '90700', 'city' => 'Ciwanro'],
            ['zipcode' => '90800', 'city' => 'Dehgulan (Dêwlan)'],
            ['zipcode' => '90900', 'city' => 'Dereşar'],
            ['zipcode' => '91000', 'city' => 'Deştebêl'],
            ['zipcode' => '91100', 'city' => 'Dêhloran'],
            ['zipcode' => '91200', 'city' => 'Dîlmeqan'],
            ['zipcode' => '91300', 'city' => 'Dîwandere'],
            ['zipcode' => '91400', 'city' => 'Enzil'],
            ['zipcode' => '91500', 'city' => 'Eywan'],
            ['zipcode' => '91600', 'city' => 'Gêlan'],
            ['zipcode' => '91700', 'city' => 'Gîyelan'],
            ['zipcode' => '91800', 'city' => 'Hamedan'],
            ['zipcode' => '91900', 'city' => 'Hersîn'],
            ['zipcode' => '92000', 'city' => 'Îlam'],
            ['zipcode' => '92100', 'city' => 'Kamyaran'],
            ['zipcode' => '92200', 'city' => 'Kengawer'],
            ['zipcode' => '92300', 'city' => 'Kirind'],
            ['zipcode' => '92400', 'city' => 'Kirmanşan'],
            ['zipcode' => '92500', 'city' => 'Mako'],
            ['zipcode' => '92600', 'city' => 'Malayer'],
            ['zipcode' => '92700', 'city' => 'Mehabad'],
            ['zipcode' => '92800', 'city' => 'Merîwan'],
            ['zipcode' => '92900', 'city' => 'Mêrgever'],
            ['zipcode' => '93000', 'city' => 'Miyanduaw'],
            ['zipcode' => '93100', 'city' => 'Nazlû'],
            ['zipcode' => '93200', 'city' => 'Nehawand'],
            ['zipcode' => '93300', 'city' => 'Nexede'],
            ['zipcode' => '93400', 'city' => 'Pawe'],
            ['zipcode' => '93500', 'city' => 'Pîranşar'],
            ['zipcode' => '93600', 'city' => 'Qereziyadîn'],
            ['zipcode' => '93700', 'city' => 'Qesirşîrîn'],
            ['zipcode' => '93800', 'city' => 'Qurwe'],
            ['zipcode' => '93900', 'city' => 'Qutûr'],
            ['zipcode' => '94000', 'city' => 'Ruwanser'],
            ['zipcode' => '94100', 'city' => 'Sehne'],
            ['zipcode' => '94200', 'city' => 'Selmas'],
            ['zipcode' => '94300', 'city' => 'Senendej'],
            ['zipcode' => '94400', 'city' => 'Seqiz'],
            ['zipcode' => '94500', 'city' => 'Serawlê'],
            ['zipcode' => '94600', 'city' => 'Serdeşt'],
            ['zipcode' => '94700', 'city' => 'Serpêlzahaw'],
            ['zipcode' => '94800', 'city' => 'Serpil'],
            ['zipcode' => '94900', 'city' => 'Sine'],
            ['zipcode' => '95000', 'city' => 'Soma'],
            ['zipcode' => '95100', 'city' => 'Sunqur'],
            ['zipcode' => '95200', 'city' => 'Şahîndij'],
            ['zipcode' => '95300', 'city' => 'Şarîkurd'],
            ['zipcode' => '95400', 'city' => 'Şêrava (Asadabad)'],
            ['zipcode' => '95500', 'city' => 'Şêrwan'],
            ['zipcode' => '95600', 'city' => 'Şino'],
            ['zipcode' => '95700', 'city' => 'Şot'],
            ['zipcode' => '95800', 'city' => 'Tazeabad'],
            ['zipcode' => '95900', 'city' => 'Tekab'],
            ['zipcode' => '96000', 'city' => 'Tirgever'],
            ['zipcode' => '96100', 'city' => 'Tuyserkan'],
            ['zipcode' => '96200', 'city' => 'Urmîye'],
            ['zipcode' => '96300', 'city' => 'Xoy'],
        ];

        $bakur = Region::where('name', 'Bakûr')->first();
        $basur = Region::where('name', 'Başûr')->first();
        $rojava = Region::where('name', 'Rojava')->first();
        $rojhilat = Region::where('name', 'Rojhilat')->first();
        if (!empty($bakur)) {
            foreach ($bakurCities as $city) {
                City::updateOrCreate(['name' => $city['city']], [
                    'country_id' => $bakur->country_id ?? '',
                    'region_id' => $bakur->_id ?? '',
                    'name' => $city['city'] ?? '',
                    'zipcode' => $city['zipcode']
                ]);
            }
        }

        if (!empty($basur)) {
            foreach ($basurCities as $city) {
                City::updateOrCreate(['name' => $city['city']], [
                    'country_id' => $basur->country_id ?? '',
                    'region_id' => $basur->_id ?? '',
                    'name' => $city['city'] ?? '',
                    'zipcode' => $city['zipcode']
                ]);
            }
        }

        if (!empty($rojava)) {
            foreach ($rojavaCities as $city) {
                City::updateOrCreate(['name' => $city['city']], [
                    'country_id' => $rojava->country_id ?? '',
                    'region_id' => $rojava->_id ?? '',
                    'name' => $city['city'] ?? '',
                    'zipcode' => $city['zipcode']
                ]);
            }
        }

        if (!empty($rojhilat)) {
            foreach ($rojhilatCities as $city) {
                City::updateOrCreate(['name' => $city['city']], [
                    'country_id' => $rojhilat->country_id ?? '',
                    'region_id' => $rojhilat->_id ?? '',
                    'name' => $city['city'] ?? '',
                    'zipcode' => $city['zipcode']
                ]);
            }
        }
    }
}
