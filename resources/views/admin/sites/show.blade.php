@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Сайт</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Главная</a></li>
                        <li class="breadcrumb-item">Настройки</li>
                        <li class="breadcrumb-item active">Сайт</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Редактирование профиля</h3>
                            <span class="float-right">
                                <a href="{{route('admin.sites.index')}}"
                                   class="btn btn-sm bg-gradient-info" title="Вернуться">
                                    <i class="fa fa-arrow-left"></i></a>
                                <a href="{{route('admin.sites.edit', $site->id)}}"
                                   class="btn btn-sm bg-gradient-warning" title="Редактирование профиля">
                                    <i class="fa fa-user-edit"></i></a>
                            </span>
                        </div>

                        <div class="card-body">
                            <div class="col-sm-6">
                                <dl>
                                    <dt> ID:</dt>
                                    <dd>{{ $site->id }}</dd>
                                    <dt> Наименование:</dt>
                                    <dd>{{ $site->name }}</dd>
                                    <dt>URL:</dt>
                                    <dd>{{ $site->url }}</dd>
                                    <dt>HTTPS:</dt>
                                    <dd>{{ $site->https }}</dd>
                                    <dt>Комментарий:</dt>
                                    <dd>{{ $site->comment }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
