<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2021 <a href="">Retania | Kost</a>.</strong> All rights reserved | Php native by <a href='https://stokcoding.com/' title='StokCoding.com' target='_blank'>StokCoding.com</a> | change to codeigniter created by  <a href="#">Rmunggaran</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

</footer>

</div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="<?php echo base_url() ?>public/admin/AdminLTE/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url() ?>public/admin/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url() ?>public/admin/AdminLTE/plugins/select2/js/select2.full.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?php echo base_url() ?>public/admin/AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>public/admin/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url() ?>public/admin/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url() ?>public/admin/AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?php echo base_url() ?>public/admin/AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url() ?>public/admin/AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo base_url() ?>public/admin/AdminLTE/plugins/jszip/jszip.min.js"></script>
    <script src="<?php echo base_url() ?>public/admin/AdminLTE/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?php echo base_url() ?>public/admin/AdminLTE/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?php echo base_url() ?>public/admin/AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url() ?>public/admin/AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url() ?>public/admin/AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- jQuery UI -->
    <script src="<?php echo base_url() ?>public/admin/AdminLTE/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- fullCalendar 2.2.5 -->
    <script src="<?php echo base_url() ?>public/admin/AdminLTE/plugins/moment/moment.min.js"></script>
    <script src="<?php echo base_url() ?>public/admin/AdminLTE/plugins/fullcalendar/main.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url() ?>public/admin/AdminLTE/dist/js/adminlte.min.js"></script>
    <!-- leaflet js  -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <!-- leaflet geocoder js  -->
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    

    <script type="text/javascript">
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })


        $(document).ready(function() {

            // sembunyikan form kabupaten, kecamatan dan desa
            $("#form_kab").hide();

            // ambil data kabupaten ketika data memilih provinsi
            $('body').on("change", "#form_prov", function() {
                var id = $(this).val();
                var data = "id=" + id + "&data=kabupaten";
                $.ajax({
                    type: 'POST',
                    url: "page/lokasi/get_daerah.php",
                    data: data,
                    success: function(hasil) {
                        $("#form_kab").html(hasil);
                        $("#form_kab").show();
                    }
                });
            });
        });

        $(document).ready(function() {
            $('.product-image-thumb').on('click', function() {
                var $image_element = $(this).find('img')
                $('.product-image').prop('src', $image_element.attr('src'))
                $('.product-image-thumb.active').removeClass('active')
                $(this).addClass('active')
            })
        });

        var rupiahbulan = document.getElementById('rupiahbulan');
        rupiahbulan.addEventListener('keyup', function(e) {
            rupiahbulan.value = formatRupiahbulan(this.value, 'Rp. ');
        });

        function formatRupiahbulan(angkabulan, prefix) {
            var number_string = angkabulan.replace(/[^,\d]/g, '').toString(),
                splitbulan = number_string.split(','),
                sisabulan = splitbulan[0].length % 3,
                rupiahbulan = splitbulan[0].substr(0, sisabulan),
                ribuanbulan = splitbulan[0].substr(sisabulan).match(/\d{3}/gi);
            if (ribuanbulan) {
                separatorbulan = sisabulan ? '.' : '';
                rupiahbulan += separatorbulan + ribuanbulan.join('.');
            }

            rupiahbulan = splitbulan[1] != undefined ? rupiahbulan + ',' + splitbulan[1] : rupiahbulan;
            return prefix == undefined ? rupiahbulan : (rupiahbulan ? 'Rp. ' + rupiahbulan : '');
        };

        var rupiahtahun = document.getElementById('rupiahtahun');
        rupiahtahun.addEventListener('keyup', function(e) {
            rupiahtahun.value = formatrupiahtahun(this.value, 'Rp. ');
        });

        function formatrupiahtahun(angka1, prefix) {
            var number_string = angka1.replace(/[^,\d]/g, '').toString(),
                split1 = number_string.split(','),
                sisa1 = split1[0].length % 3,
                rupiahtahun = split1[0].substr(0, sisa1),
                ribuan1 = split1[0].substr(sisa1).match(/\d{3}/gi);
            if (ribuan1) {
                separator1 = sisa1 ? '.' : '';
                rupiahtahun += separator1 + ribuan1.join('.');
            }

            rupiahtahun = split1[1] != undefined ? rupiahtahun + ',' + split1[1] : rupiahtahun;
            return prefix == undefined ? rupiahtahun : (rupiahtahun ? 'Rp. ' + rupiahtahun : '');
        }

        function previewImageUtama() {
            document.getElementById("file-upload-utama").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("file-upload-utama").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("image-preview").src = oFREvent.target.result;
                document.getElementById("image-preview-utama").src = oFREvent.target.result;
            };
        };

        function previewImageKamar() {
            document.getElementById("file-upload-kamar").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("file-upload-kamar").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("image-preview-kamar").src = oFREvent.target.result;
            };
        };

        function previewImageToilet() {
            document.getElementById("file-upload-toilet").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("file-upload-toilet").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("image-preview-toilet").src = oFREvent.target.result;
            };
        };

        function previewImageOption1() {
            document.getElementById("file-upload-option1").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("file-upload-option1").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("image-preview-option1").src = oFREvent.target.result;
            };
        };

        function previewImageOption2() {
            document.getElementById("file-upload-option2").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("file-upload-option2").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("image-preview-option2").src = oFREvent.target.result;
            };
        };

        function previewImageOption3() {
            document.getElementById("file-upload-option3").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("file-upload-option3").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("image-preview-option3").src = oFREvent.target.result;
            };
        };

        function previewImageOption4() {
            document.getElementById("file-upload-option4").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("file-upload-option4").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("image-preview-option4").src = oFREvent.target.result;
            };
        };

        function previewImageOption5() {
            document.getElementById("file-upload-option5").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("file-upload-option5").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("image-preview-option5").src = oFREvent.target.result;
            };
        };

        function previewImageOption6() {
            document.getElementById("file-upload-option6").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("file-upload-option6").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("image-preview-option6").src = oFREvent.target.result;
            };
        };

        function previewImageOption7() {
            document.getElementById("file-upload-option7").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("file-upload-option7").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("image-preview-option7").src = oFREvent.target.result;
            };
        };

        //maps
        // set lokasi latitude dan longitude, lokasinya kota palembang 
        var mymap = L.map('mapid').setView([-2.9547949, 104.6929233], 5);
        //setting maps menggunakan api mapbox bukan google maps, daftar dan dapatkan token      
        L.tileLayer(
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoicmV0YW5pYWtvc3QiLCJhIjoiY2t4ZTA0eXpiMW85NjMwcGY3N2VjcjE4eiJ9.RYHIYy7B60p7_rgE-GGL1Q', {
                maxZoom: 20,
                id: 'mapbox/streets-v11', //menggunakan peta model streets-v11 kalian bisa melihat jenis-jenis peta lainnnya di web resmi mapbox
                tileSize: 512,
                zoomOffset: -1,
                accessToken: 'pk.eyJ1IjoicmV0YW5pYWtvc3QiLCJhIjoiY2t4ZTA0eXpiMW85NjMwcGY3N2VjcjE4eiJ9.RYHIYy7B60p7_rgE-GGL1Q'
            }).addTo(mymap);

        L.Control.geocoder().addTo(mymap);

        // buat variabel berisi fugnsi L.popup 
        var popup = L.popup();

        // buat fungsi popup saat map diklik
        function onMapClick(e) {
            popup
                .setLatLng(e.latlng)
                .setContent("Titik Di Terapkan"
                    .toString()
                ) //set isi konten yang ingin ditampilkan, kali ini kita akan menampilkan latitude dan longitude
                .openOn(mymap);

            document.getElementById('latlong').value = e.latlng //value pada form latitde, longitude akan berganti secara otomatis
        }
        mymap.on('click', onMapClick); //jalankan fungsi
        L.marker([<?php echo str_replace(['[', ']', 'LatLng', '(', ')'], '', $data_edit['map']); ?>]).addTo(mymap);
        
    </script>

    
</body>

</html>