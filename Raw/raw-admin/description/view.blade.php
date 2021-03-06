@extends('raw-admin.includes.app')
@section('main-section')

          <div class="col-xs-12">
            <a href="{{ route('description.create') }}"><span class="btn btn-success">Add New Description</span></a>
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">User Descriptions</h3>

                <div class="box-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input name="table_search" class="form-control pull-right" placeholder="Search" type="text">

                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <tbody><tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  @foreach($descriptions as $description)

                    <tr>
                      <td>{{ $description->title }}</td>
                      <td>{{ $description->description }}</td>
                      <td>
                          <a href="{{ route('description.edit', $description->id) }}"><i class="fa fa-edit"></i></a>
                      </td>
                      <td>
                        <form id="delete-form-{{ $description->id }}" method="post" action="{{ route('description.destroy', $description->id) }}" style="display: none;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        </form>
                        <a href=""  onclick="
                                if(confirm('Are you sure, you want to delete this?')){
                                event.preventDefault();
                                document.getElementById('delete-form-{{ $description->id }}').submit();
                                } else {
                                event.preventDefault();
                                }
                                "><span class="fa fa-trash"></span>
                        </a>
                      </td>
                    </tr>
                  @endforeach
                </tbody></table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>


  @endsection
