@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
               <div class="card">
                   <h1 class="card-header">Мои доходы</h1>
                   <div class="card-body">
                       <h2 class="h2 mb-3 text-center">по пакетам</h2>
                       <table class="table table-responsive table-hover">
                           <colgroup>
                               <col width="30%" span="1">
                               <col width="20%" span="1">
                               <col width="20%" span="1">
                               <col width="20%" span="1">
                               <col width="20%" span="1">
                           </colgroup>
                           <thead>
                           <tr>
                               @foreach($packages as $package)
                                   @if($loop->index === 0)<th scope="col">#</th>@endif
                                   <th scope="col">{{ $package->title }}</th>
                               @endforeach
                           </tr>
                           </thead>
                           <tbody>
                           <tr>
                               <th scope="row">Линейный бонус</th>
                               <td></td>
                               <td></td>
                               <td></td>
                               <td></td>
                           </tr>
                           <tr>
                               @foreach($packages as $package)
                                   @if($loop->index === 0)<td scope="row">1-й уровень</td>@endif
                                   <td>
                                       @if($package->linear_bonus_lvl1 == 0)
                                           Нет
                                       @else
                                           {{ $package->linear_bonus_lvl1 }}%
                                       @endif
                                   </td>
                               @endforeach
                           </tr>
                           <tr>
                               @foreach($packages as $package)
                                   @if($loop->index === 0)<td scope="row">2-й уровень</td>@endif
                                   <td>
                                       @if($package->linear_bonus_lvl2 == 0)
                                           Нет
                                       @else
                                           {{ $package->linear_bonus_lvl2 }}%
                                       @endif
                                   </td>
                               @endforeach
                           </tr>
                           <tr>
                               @foreach($packages as $package)
                                   @if($loop->index === 0)<th scope="row">Бинар - бонус</th>@endif
                                   <td>
                                       @if($package->binary_bonus_main == 0)
                                           Нет
                                       @else
                                           {{ $package->binary_bonus_main }}%
                                       @endif
                                   </td>
                               @endforeach
                           </tr>
                           <tr>
                               <td>Бинарный цикл</td>
                               <td colspan="4">190 / 190</td>
                           </tr>
                           <tr>
                               <th scope="row">Матчинг бонус</th>
                               <td colspan="4">От дохода по бинару, полученного личниками </td>
                           </tr>
                           <tr>
                               @foreach($packages as $package)
                                   @if($loop->index === 0)<td scope="row">Уровень 1</td>@endif
                                   <td>
                                       @if($package->binary_bonus_lvl1 == 0)
                                           Нет
                                       @else
                                           {{ $package->binary_bonus_lvl1 }}%
                                       @endif
                                   </td>
                               @endforeach
                           </tr>
                           <tr>
                               @foreach($packages as $package)
                                   @if($loop->index === 0)<td scope="row">Уровень 2</td>@endif
                                   <td>
                                       @if($package->binary_bonus_lvl2 == 0)
                                           Нет
                                       @else
                                           {{ $package->binary_bonus_lvl2 }}%
                                       @endif
                                   </td>
                               @endforeach
                           </tr>
                           <tr>
                               @foreach($packages as $package)
                                   @if($loop->index === 0)<td scope="row">Уровень 3</td>@endif
                                   <td>
                                       @if($package->binary_bonus_lvl3 == 0)
                                           Нет
                                       @else
                                           {{ $package->binary_bonus_lvl3 }}%
                                       @endif
                                   </td>
                               @endforeach
                           </tr>
                           <tr>
                               @foreach($packages as $package)
                                   @if($loop->index === 0)<td scope="row">Уровень 4</td>@endif
                                   <td>
                                       @if($package->binary_bonus_lvl4 == 0)
                                           Нет
                                       @else
                                           {{ $package->binary_bonus_lvl4 }}%
                                       @endif
                                   </td>
                               @endforeach
                           </tr>
                           <tr>
                               @foreach($packages as $package)
                                   @if($loop->index === 0)<td scope="row">Уровень 5</td>@endif
                                   <td>
                                       @if($package->binary_bonus_lvl5 == 0)
                                           Нет
                                       @else
                                           {{ $package->binary_bonus_lvl5 }}%
                                       @endif
                                   </td>
                               @endforeach
                           </tr>
                           </tbody>
                       </table>
                   </div>
               </div>
            </div>
        </div>
    </div>
@endsection