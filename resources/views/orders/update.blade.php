<section class="content-header">
    <h1>
        Orders
        <small>Blogs</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Home</a>
        <li class="active"><i class="fas fa-blog"></i>Blogs</a>
        <li><a href="{{url('/orders')}}"><i class="fa fa-tag"></i>Orders</a>
        <li class="active"><i class="fa fa-plus"></i>Create New</a>
    </ol>
</section>

<!-- {{-- main content --}} -->
<section>

    <!-- {{-- default box --}} -->
    <section class="content">

            <!-- Default box -->
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Create New</h3> 
              </div>
              <div class="box-body">
              {{Form::open(array('url' => 'orders/update/'.$orders->idorders, 'class' => 'form-horizontal','files' => 'true'))}}
                <div class="form-group">
                  <label class="col-sm-2 control-label"> Name</label>
                  <div class="col-sm-5">
                    <!-- {{-- name:name untuk melempar controller ke database --}} -->
                    <input type="text" class="form-control" value="{{$orders->name}}" name="name" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Internal</label>
                  <div class="col-sm-5">
                    <select name="internals[]" class="form-control select2" multiple="multiple">
                      @foreach ($internals as $internal)
                        <option value="{{$internal->idinternals}}" @if(in_array($internal->idinternals,$data_internals))
                        selected
                        @endif> {{$internal->name}} </option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="active" checked> Active
                        </label>
                      </div>
                    </div>
                </div>

                <hr>
                <div class="form-group">
                  <label class="col-sm-2 control-label"></label>
                  <div class="col-sm-10">
                    <a href="{{url('internals')}}" class="btn btn-warning pull-right">Back</a>
                    <input type="submit" value="Save" class="btn btn-primary">
                  </div>
                </div>
                {{ Form::close() }}
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          
          </section>
    </section>
