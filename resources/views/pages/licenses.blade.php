@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
               <div class="card mb-5">
                   <h1 class="card-header">Мои лицензии</h1>

                   <div class="card-body">
                       <h2 class="h2 mb-3 text-center">Пакеты</h2>
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
                               @foreach($packages as $package)
                                   @if($loop->index === 0)<td scope="row">Цена пакета (за год)</td>@endif
                                       <td>
                                           @if($package->price_year == 0)
                                               Нет
                                           @else
                                               {{ $package->price_year }}
                                           @endif
                                       </td>
                               @endforeach
                           </tr>
                           <tr>
                               @foreach($packages as $package)
                                   @if($loop->index === 0)<td scope="row">Цена пакета (в месяц)</td>@endif
                                   <td>
                                       @if($package->price_month == 0)
                                           Нет
                                       @else
                                           {{ $package->price_month }}
                                       @endif
                                   </td>
                               @endforeach
                           </tr>
                           <tr>
                               @foreach($packages as $package)
                                   @if($loop->index === 0)<td scope="row">Максимальный депозит на одну лицензию</td>@endif
                                   <td>{{ $package->max_deposit }}</td>
                               @endforeach
                           </tr>
                           <tr>
                               @foreach($packages as $package)
                                   @if($loop->index === 0)<td scope="row">Кол-во лицензий</td>@endif
                                   <td>{{ $package->quantity }}</td>
                               @endforeach
                           </tr>
                           </tbody>
                       </table>

                           @if(auth()->user()->howMuchToEndTariff())
                               <div class="alert alert-success mt-5 text-center" role="alert">
                                   <span>{{ auth()->user()->howMuchToEndTariff() }} окончания вашего тарифа</span>
                               </div>
                           @else
                                <div class="alert alert-danger mt-5 text-center" role="alert">
                                    <span>У вас отсутствует активный тариф</span>
                                </div>
                           @endif


                       @empty(auth()->user()->activated_to)
                           <div class="d-flex justify-content-center align-items-center py-4">
                               <button type="button" class="btn btn-danger mx-2" data-toggle="modal" data-target="#licenses-new">
                                   Приобрести лицензию
                               </button>
                               <div class="modal fade" id="licenses-new" tabindex="-1" role="dialog" aria-labelledby="licenses-new" aria-hidden="true">
                                   <div class="modal-dialog modal--news" role="document">
                                       <div class="modal-content">
                                           <div class="modal-header">
                                               <h5 class="modal-title">Приобрести лицензию</h5>
                                               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                   <span aria-hidden="true">&times;</span>
                                               </button>
                                           </div>
                                           <div class="modal-body">
                                               <tariff-selection
                                                       action="{{ route('api.updatePackage') }}"
                                                       type="new"
                                                       packages="{{  $packages->toJson() }}"
                                                       user="{{ Auth::user()->toJson() }}"
                                               ></tariff-selection>
                                           </div>
                                           <div class="modal-footer">
                                               <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       @else
                           <div class="d-flex justify-content-center align-items-center py-4">
                               <button type="button" class="btn btn-primary mx-2" data-toggle="modal" data-target="#licenses-continue">
                                   Продлить лицензию
                               </button>
                               <button type="button" class="btn btn-success mx-2" data-toggle="modal" data-target="#licenses-change">
                                   Апгрейд
                               </button>
                               <div class="modal fade" id="licenses-continue" tabindex="-1" role="dialog" aria-labelledby="licenses-continue" aria-hidden="true">
                                   <div class="modal-dialog modal--news" role="document">
                                       <div class="modal-content">
                                           <div class="modal-header">
                                               <h5 class="modal-title">Продление лицензии</h5>
                                               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                   <span aria-hidden="true">&times;</span>
                                               </button>
                                           </div>
                                           <div class="modal-body">
                                               <tariff-selection
                                                    action="{{ route('api.updatePackage') }}"
                                                    type="continue"
                                                    packages="{{  $packages->toJson() }}"
                                                    user="{{ Auth::user()->toJson() }}"
                                               ></tariff-selection>
                                           </div>
                                           <div class="modal-footer">
                                               <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="modal fade" id="licenses-change" tabindex="-1" role="dialog" aria-labelledby="licenses-change" aria-hidden="true">
                                   <div class="modal-dialog modal--news" role="document">
                                       <div class="modal-content">
                                           <div class="modal-header">
                                               <h5 class="modal-title" id="exampleModalLabel">Апгрейд</h5>
                                               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                   <span aria-hidden="true">&times;</span>
                                               </button>
                                           </div>
                                           <div class="modal-body">
                                               <tariff-selection
                                                       action="{{ route('api.updatePackage') }}"
                                                       type="change"
                                                       packages="{{  $packages->toJson() }}"
                                                       user="{{ Auth::user()->toJson() }}"
                                               ></tariff-selection>
                                           </div>
                                           <div class="modal-footer">
                                               <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       @endempty
                   </div>
               </div>
            </div>
        </div>
    </div>
@endsection