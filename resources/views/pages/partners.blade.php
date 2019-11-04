@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
               <div class="card">
                   <h1 class="card-header">Мои партнеры</h1>
                   <div class="card-body">
                       <referral-tree
                           user="{{ $user }}"
                           binary-parent="{{ $binaryParent }}"
                           linear-parent="{{ $linearParent }}"
                       ></referral-tree>
                   </div>
               </div>
            </div>
        </div>
    </div>
@endsection