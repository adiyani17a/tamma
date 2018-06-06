
    <script src="{{ asset ('assets/script/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset ('assets/js/date-uk.js') }}"></script>
{{--     <script src="{{ asset ('assets/js/my.js') }}"></script> --}}
    <script src="{{ asset ('assets/js/js_ssb.js') }}"></script>
{{--     <script src="{{ asset ('assets/script/jquery-1.10.2.min.js') }}"></script> --}}
{{--     <script src="{{ asset ('assets/script/jquery-2.2.4.min.js') }}"></script> --}}
    <script src="{{ asset ('assets/script/jquery-migrate-1.2.1.min.js') }}"></script>
    <script src="{{ asset ('assets/script/jquery-ui.js') }}"></script>
    <script src="{{ asset ('assets/script/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset ('assets/script/bootstrap.min.js') }}"></script>
    <script src="{{ asset ('assets/script/bootstrap-hover-dropdown.js') }}"></script>
{{--     <script src="{{ asset ('assts/script/html5shiv.js') }}"></script> --}}
    <script src="{{ asset ('assets/script/respond.min.js') }}"></script>
    <script src="{{ asset ('assets/script/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset ('assets/script/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset ('assets/script/jquery.cookie.js') }}"></script>
    <script src="{{ asset ('assets/script/icheck.min.js') }}"></script>
    <script src="{{ asset ('assets/script/custom.min.js') }}"></script>
    <script src="{{ asset ('assets/script/jquery.news-ticker.js') }}"></script>
    <script src="{{ asset ('assets/script/jquery.menu.js') }}"></script>
    <script src="{{ asset ('assets/script/pace.min.js') }}"></script>
    <script src="{{ asset ('assets/script/holder.js') }}"></script>
    <script src="{{ asset ('assets/script/responsive-tabs.js') }}"></script>
    <script src="{{ asset ('assets/script/jquery.flot.js') }}"></script>
    <script src="{{ asset ('assets/script/jquery.flot.categories.js') }}"></script>
    <script src="{{ asset ('assets/script/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset ('assets/script/jquery.flot.tooltip.js') }}"></script>
    <script src="{{ asset ('assets/script/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset ('assets/script/jquery.flot.fillbetween.js') }}"></script>
    <script src="{{ asset ('assets/script/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset ('assets/script/jquery.flot.spline.js') }}"></script>
    <script src="{{ asset ('assets/script/zabuto_calendar.min.js') }}"></script>
    <script src="{{ asset ('assets/script/index.js') }}"></script>
    <script src="{{ asset ('assets/script/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset ('assets/script/jquery.dataTables.js') }}"></script>
    <script src="{{ asset ('assets/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset ('assets/select2/select2.min.js') }}"></script>
    <!--LOADING SCRIPTS FOR CHAfRTS-->
    <script src="{{ asset ('assets/script/highcharts.js') }}"></script>
    <script src="{{ asset ('assets/script/data.js') }}"></script>
    <script src="{{ asset ('assets/script/drilldown.js') }}"></script>
    <script src="{{ asset ('assets/script/exporting.js') }}"></script>
    <script src="{{ asset ('assets/script/highcharts-more.js') }}"></script>
    <script src="{{ asset ('assets/script/charts-highchart-pie.js') }}"></script>
    <script src="{{ asset ('assets/script/charts-highchart-more.js') }}"></script>
    <!--CORE JAVASCRIPT-->
    <script src="{{ asset ('assets/script/main.js') }}"></script>
    <script src="{{ asset ('assets/script/timepicker.min.js') }}"></script>
    <script type="text/javascript">
        var baseUrl = '{{url('/')}}';

        toastr.options = {
          "closeButton": true,
          "debug": false,
          "newestOnTop": false,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        };

    </script>
    <script>
         $(document).ready(function() {
            var extensions = {
                 "sFilterInput": "form-control input-sm",
                "sLengthSelect": "form-control input-sm"
            }
            // Used when bJQueryUI is false
            $.extend($.fn.dataTableExt.oStdClasses, extensions);
            // Used when bJQueryUI is true
            $.extend($.fn.dataTableExt.oJUIClasses, extensions);

            
            $('.data-table').dataTable({
                  "responsive":true,

                  "pageLength": 10,
                "lengthMenu": [[10, 20, 50, - 1], [10, 20, 50, "All"]],
                "language": {
                    "searchPlaceholder": "Cari Data",
                    "emptyTable": "Tidak ada data",
                    "sInfo": "Menampilkan _START_ - _END_ Dari _TOTAL_ Data",
                    "sSearch": '<i class="fa fa-search"></i>',
                    "sLengthMenu": "Menampilkan &nbsp; _MENU_ &nbsp; Data",
                    "infoEmpty": "",
                    "paginate": {
                            "previous": "Sebelumnya",
                            "next": "Selanjutnya",
                         }
                  }

                });
            });
    </script>