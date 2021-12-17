<script src="{{asset('assets/vendors/select2/select2.min.js')}}"></script>
<script src="{{asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="{{asset('assets/vendors/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatables/dataTables.bootstrap.min.js')}}"></script>
@toastr_js
@toastr_render
<script>
    $('.datepicker-input').datepicker();
    $('.select2').select2({
        placeholder: 'Select an option'
    });

    var quill = new Quill('#editor', {
        theme: 'snow'
    });
    $('#data-table').DataTable();

</script>
