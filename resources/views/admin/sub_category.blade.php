@extends('admin.shared._layout_admin')
@section('content')
<div class="content-wrapper" ng-controller="sub_category">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Sub Category Manager</h1>
            <p><button class="btn btn-primary" ng-click="showmodal(0)"><i class="fa fa-plus"> Create</i></button></p>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Manager</a></li>
              <li class="breadcrumb-item active">Sub Category</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Category Name</th>
              <th scope="col">Sub Category Name</th>
              <th scope="col">Description</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
            <tr dir-paginate="item in sub_categories|itemsPerPage:5|filter:keyword">
              <td>@{{$index+1}}</td>
              <td>@{{item.category.category_name}}</td>
              <td>@{{item.sub_category_name}}</td>
              <td>@{{item.description}}</td>
              <td><button class="btn btn-info" ng-click="showmodal(item.id)">&nbsp;Edit</button></td>
              <td><button class="btn btn-danger" ng-click="deleteClick(item.id)">&nbsp;Delete</button></td>
            </tr>
          </tbody>
        </table>
        <dir-pagination-controls
            max-size="5"
            direction-links="true"
            boundary-links="true" >
        </dir-pagination-controls>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                            <h5 class="modal-title">@{{modalTitle}}</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="form-group">
                            <label for="category">Category: </label>
                            <select class="custom-select" name="category" id="category" ng-model="sub_category.category_id">
                                <option ng-repeat="option in categories" value="@{{option.id}}">@{{option.category_name}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Category Name:</label>
                            <div>
                                <input type="text" class="form-control" ng-model="sub_category.sub_category_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Description:</label>
                            <div>
                                <textarea style="height: 100px;" type="text" class="form-control" ng-model="sub_category.description">

                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" ng-click="saveData()">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
@stop
@section('js')
<script src="/assets/admin/dist/js/sub_categorycontroller.js"></script>
@stop