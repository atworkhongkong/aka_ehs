@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="content__wrapper">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/ecs/meal">每週飯餸</a></li>
                    <li class="breadcrumb-item active" aria-current="page">編輯每週飯餸</li>
                </ol>
            </nav>

            <div class="form-container">
                <form>
                    <div class="row mb-3">
                        <div class="col-4">
                            <label for="input-week" class="form-label">週份</label>
                            <input type="week" class="form-control" id="input-week" value="2021-W06"">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">&nbsp;</th>
                                        <th scope="col" class="text-center">2月8日 (一)</th>
                                        <th scope="col" class="text-center">2月9日 (二)</th>
                                        <th scope="col" class="text-center">2月10日 (三)</th>
                                        <th scope="col" class="text-center">2月11日 (四)</th>
                                        <th scope="col" class="text-center holiday">2月12日 (五)</th>
                                        <th scope="col" class="text-center holiday">2月13日 (六)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">早</th>
                                        <td><input type="text" class="form-control" value="雜菜肉絲炒米"></td>
                                        <td><input type="text" class="form-control" value="金針雲耳肉片盅蒸飯"></td>
                                        <td><input type="text" class="form-control" value="蛋治、麥皮"></td>
                                        <td><input type="text" class="form-control" value="時菜水餸湯蕎麥麵"></td>
                                        <td class="holiday"><input type="text" class="form-control" value=""></td>
                                        <td class="holiday"><input type="text" class="form-control" value=""></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">午</th>
                                        <td class="text-center">
                                            <input type="text" class="form-control mb-1" placeholder="1." value="陳皮薑蔥蒸時鮮">
                                            <input type="text" class="form-control d-inline-block mb-5" value="時菜" placeholder="配">
                                            <input type="text" class="form-control mb-1" placeholder="2." value="金銀蛋碎肉扒時蔬 (低鹽︰免咸蛋)">
                                            <input type="text" class="form-control d-inline-block" value="時菜" placeholder="配">
                                        </td>
                                        <td class="text-center">
                                            <input type="text" class="form-control mb-1" placeholder="1." value="">
                                            <input type="text" class="form-control d-inline-block mb-5" placeholder="配">
                                            <input type="text" class="form-control mb-1" placeholder="2." value="">
                                            <input type="text" class="form-control d-inline-block" placeholder="配">
                                        </td>
                                        <td class="text-center">
                                            <input type="text" class="form-control mb-1" placeholder="1." value="">
                                            <input type="text" class="form-control d-inline-block mb-5" placeholder="配">
                                            <input type="text" class="form-control mb-1" placeholder="2." value="">
                                            <input type="text" class="form-control d-inline-block" placeholder="配">
                                        </td>
                                        <td class="text-center">
                                            <input type="text" class="form-control mb-1" placeholder="1." value="">
                                            <input type="text" class="form-control d-inline-block mb-5" placeholder="配">
                                            <input type="text" class="form-control mb-1" placeholder="2." value="">
                                            <input type="text" class="form-control d-inline-block" placeholder="配">
                                        </td>
                                        <td class="text-center holiday">
                                            <input type="text" class="form-control mb-1" placeholder="1." value="">
                                            <input type="text" class="form-control d-inline-block mb-5" placeholder="配">
                                            <input type="text" class="form-control mb-1" placeholder="2." value="">
                                            <input type="text" class="form-control d-inline-block" placeholder="配">
                                        </td>
                                        <td class="text-center holiday">
                                            <input type="text" class="form-control mb-1" placeholder="1." value="">
                                            <input type="text" class="form-control d-inline-block mb-5" placeholder="配">
                                            <input type="text" class="form-control mb-1" placeholder="2." value="">
                                            <input type="text" class="form-control d-inline-block" placeholder="配">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">晚</th>
                                        <td class="text-center">
                                            <input type="text" class="form-control mb-1" placeholder="1." value="節瓜冬菇妏雞絲 (痛風︰免冬菇)">
                                            <input type="text" class="form-control d-inline-block mb-5" value="時菜" placeholder="配">
                                            <input type="text" class="form-control mb-1" placeholder="2." value="三絲炒瀨粉 (叉燒絲、蛋絲、甘筍/青椒絲)">
                                            <input type="text" class="form-control d-inline-block" value="時菜" placeholder="配">
                                        </td>
                                        <td class="text-center">
                                            <input type="text" class="form-control mb-1" placeholder="1.">
                                            <input type="text" class="form-control d-inline-block mb-5" value="時菜" placeholder="配">
                                            <input type="text" class="form-control mb-1" placeholder="2.">
                                            <input type="text" class="form-control d-inline-block" value="時菜" placeholder="配">
                                        </td>
                                        <td class="text-center">
                                            <input type="text" class="form-control mb-1" placeholder="1.">
                                            <input type="text" class="form-control d-inline-block mb-5" value="時菜" placeholder="配">
                                            <input type="text" class="form-control mb-1" placeholder="2.">
                                            <input type="text" class="form-control d-inline-block" value="時菜" placeholder="配">
                                        </td>
                                        <td class="text-center">
                                            <input type="text" class="form-control mb-1" placeholder="1.">
                                            <input type="text" class="form-control d-inline-block mb-5" value="時菜" placeholder="配">
                                            <input type="text" class="form-control mb-1" placeholder="2.">
                                            <input type="text" class="form-control d-inline-block" value="時菜" placeholder="配">
                                        </td>
                                        <td class="text-center holiday">
                                            <input type="text" class="form-control mb-1" placeholder="1.">
                                            <input type="text" class="form-control d-inline-block mb-5" placeholder="配">
                                            <input type="text" class="form-control mb-1" placeholder="2.">
                                            <input type="text" class="form-control d-inline-block" placeholder="配">
                                        </td>
                                        <td class="text-center holiday">
                                            <input type="text" class="form-control mb-1" placeholder="1.">
                                            <input type="text" class="form-control d-inline-block mb-5" placeholder="配">
                                            <input type="text" class="form-control mb-1" placeholder="2.">
                                            <input type="text" class="form-control d-inline-block" placeholder="配">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="field-status">狀態</label>
                            <select class="form-control" id="field-status">
                                <option value="A">有效</option>
                                <option value="I" SELECTED>無效</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">更 新</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        .holiday { background-color: #EFEFEF;}
    </style>
@endsection
