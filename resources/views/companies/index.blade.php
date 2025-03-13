@extends('layouts.app')

@section('script')
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
@endsection
@section('content')
<div class="container">
  <div class="row justify-content-end">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">{{ __('Company') }}</div>

        <div class="card-body">
          <div class="row justify-content-end">
            <div class="col-md-2 d-flex justify-content-end pb-2">
              <a href="{{ route('companies.create') }}" class="btn btn-success">
                Add Company
              </a>
            </div>
          </div>
          <div class="row">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Company Name</th>
                  <th>Email</th>
                  <th>Website Link</th>
                  <th width="105px">Action</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(function() {

    var table = $('.data-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('companies.index') }}",
      columnDefs: [
        {
          targets: -1,
          className: 'dt-body-center'
        }
      ],
      columns: [{
          data: 'name_with_logo',
          name: 'name_with_logo'
        },
        {
          data: 'email',
          name: 'email'
        },
        {
          data: 'website_url',
          name: 'website_url'
        },
        {
          data: 'action',
          name: 'action',
          orderable: false,
          searchable: false
        },
      ]
    });

  });
</script>
@endsection