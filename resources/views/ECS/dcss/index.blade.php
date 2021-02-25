@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="content__wrapper">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">智友醫社同行計劃</li>
                </ol>
            </nav>

            <div class="form-container pb-4 mb-4 border-bottom border-muted rounded">
                <form class="form-inline" action="/ecs/dcss" method="GET" onsubmit="return false;">
                    <label class="sr-only" for="field-center">中心</label>
                    <select id="field-center" class="form-control mr-2" name="center">
                        @foreach($centers as $k => $c)
                            <option value="{{ $k }}">{{ $c }}</option>
                        @endforeach
                    </select>

                    <label class="sr-only" for="field-type">類別</label>
                    <select id="field-type" class="form-control mr-2" name="center">
                        <option value=""></option>
                        <option value="code">個案編號</option>
                        <option value="name">申請人姓名</option>
                        <option value="hkid">身份證編號</option>
                    </select>

                    <label class="sr-only" for="field-key-word">關鍵字</label>
                    <input type="text" class="form-control mr-2" id="field-key-word" placeholder="關鍵字">

                    <button type="submit" class="btn btn-primary mx-1">搜尋</button>
                </form>
            </div>

            <div class="row">
                <div class="col-12 mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <span>找到{{ count($cases) }}筆記錄</span>
                        <div>
                            <a href="/ecs/dcss/create" class="btn btn-secondary">新增評估個案</a>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" style="width:8%;">個案編號</th>
                                <th scope="col">組別</th>
                                <th scope="col">申請人姓名</th>
                                <th scope="col">姓別</th>
                                <th scope="col">出生日期</th>
                                <th scope="col">狀態</th>
                                <th scope="col" style="width:8%;">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cases as $k => $v)
                                <tr>
                                    <td>{{ $v['case_number'] }}</td>
                                    <td>{{ $v['group'] }}</td>
                                    <td>{{ $v['name'] }}</td>
                                    <td>{{ $v['gender'] }}</td>
                                    <td>{{ $v['dob'] }}</td>
                                    <td>{{ $statuses[$v['status']] }}</td>
                                    <td><a class="btn btn-primary" href="/ecs/dcss/{{ $k }}/edit">編輯</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
