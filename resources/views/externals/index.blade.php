<section class="content-header">
    <h1>Externals</h1>
    <ol class="breadcrumb">
      <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><i class="fa fa-tag" aria-hidden="true"></i> Externals</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
      
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Index</h3>
        <div class="box-tools pull-right">
          <a href="{{url('externals/create-new')}}" class="btn btn-box-tool" title="Create New"><i class="fa fa-plus"></i> Create New</a>
        </div>
      </div>
      <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Name</th>
            <th>status</th>
            <th></th>
          </tr>
          </thead>
          <tbody>
          @foreach($externals as $index => $external)
          <tr>
            <td>{{$index+1}}</td>
            <td>{{$external->name}}</td>
            <td>
                <center>
                    @if ($external->active)
                    <span class="label label-success">Actice</span>
                    @else
                    <span class="label label-danger">Inactive</span>
                    @endif
                </center>
            </td>
            <td>
              <center>
                <a href="{{url('/externals/update/'.$external->idexternals)}}" ><i class="fa fa-pencil-square-o"></i></a>
              </center>
            </td>
            
          </tr>
          @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  
  </section>