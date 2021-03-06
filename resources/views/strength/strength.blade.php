@extends('layouts.master')

@section('content-header')

    <div class="d-flex align-items-center">

        <div class="mr-auto">
            <h3 class="m-subheader__title ">
                Create Category and Strength
            </h3>
        </div>

        @include('partials.footerscripts')
    </div>
@endsection

@section('content-body')

    <div class="m-content">
        <div id="app">
            <div class="row">
                <div class="admin__form admin__form--clear col-lg-6"><h4>Category</h4>
                    <form class="m-form" action="{{action('CategoryController@createCategory')}}" method="post">
                        @csrf
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row"><label for="example-text-input"
                                                                             class="col-sm-3 col-xs-12  col-form-label">Category Name</label>
                                <div class="col-sm-9 col-xs-12 "><input type="text" placeholder="Category name"
                                                                        class="form-control m-input" name="category_name" required></div>
                            </div>
                            <div class="form-group m-form__group row"><label for="example-text-input"
                                                                             class="col-sm-3 col-xs-12  col-form-label">Category Colour</label>
                                <div class="col-sm-9 col-xs-12 "><input type="color" placeholder="Category colour E.g blue"
                                                                        class="form-control m-input" name="category_colour" required></div>
                            </div>
                            <div class="form-group m-form__group row"><label for="exampleTextarea"
                                                                             class="col-sm-3 col-xs-12 col-form-label">Description</label>
                                <div class="col-sm-9 col-xs-12"><textarea id="exampleTextarea" rows="3"
                                                                          class="form-control m-input" required name="category_description"></textarea></div>
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions">
                                <div class="row">
                                    <div class="col-sm-3 col-xs-12"></div>
                                    <div class="col-sm-9 col-xs-12">
                                        <div class="profile-timeline__action">
                                            <button type="submit"  class="btn btn-success m-btn m-btn--pill">
                                                <span><span>Submit</span></span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="admin__form admin__form--clear col-lg-6"><h4>Strength</h4>
                    <form class="m-form" method="post" action="{{action('StrengthController@createStrength')}}">
                        @csrf
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row"><label for="example-text-input"
                                                                             class="col-sm-3 col-xs-12  col-form-label">Strength</label>
                                <div class="col-sm-9 col-xs-12 "><input required type="text" name="strength_name" placeholder="Strength name"
                                                                        class="form-control m-input"></div>
                            </div>
                            <div class="form-group m-form__group row"><label for="exampleTextarea"
                                                                             class="col-sm-3 col-xs-12 col-form-label">Category</label>
                                <div class="col-sm-9 col-xs-12"><select id="exampleTextarea" rows="3"
                                                                        class="form-control m-input" name="category_id" required>
                                        <option ></option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="form-group m-form__group row"><label for="exampleTextarea"
                                                                             class="col-sm-3 col-xs-12 col-form-label">Description</label>
                                <div class="col-sm-9 col-xs-12"><textarea id="exampleTextarea" rows="3"
                                                                          required class="form-control m-input" name="strength_description"></textarea></div>
                            </div>

                        </div>
                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions">
                                <div class="row">
                                    <div class="col-sm-3 col-xs-12"></div>
                                    <div class="col-sm-9 col-xs-12">
                                        <div class="profile-timeline__action">
                                            <button type="submit" class="btn btn-success m-btn m-btn--pill">
                                                <span><span>Submit</span></span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>

@endsection