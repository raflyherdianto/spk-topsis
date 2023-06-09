<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title }}</title>

    <link rel="shortcut icon" href="{{ asset('/compiled/svg/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon"
        href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACEAAAAiCAYAAADRcLDBAAAEs2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iWE1QIENvcmUgNS41LjAiPgogPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6ZXhpZj0iaHR0cDovL25zLmFkb2JlLmNvbS9leGlmLzEuMC8iCiAgICB4bWxuczp0aWZmPSJodHRwOi8vbnMuYWRvYmUuY29tL3RpZmYvMS4wLyIKICAgIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIKICAgIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgZXhpZjpQaXhlbFhEaW1lbnNpb249IjMzIgogICBleGlmOlBpeGVsWURpbWVuc2lvbj0iMzQiCiAgIGV4aWY6Q29sb3JTcGFjZT0iMSIKICAgdGlmZjpJbWFnZVdpZHRoPSIzMyIKICAgdGlmZjpJbWFnZUxlbmd0aD0iMzQiCiAgIHRpZmY6UmVzb2x1dGlvblVuaXQ9IjIiCiAgIHRpZmY6WFJlc29sdXRpb249Ijk2LjAiCiAgIHRpZmY6WVJlc29sdXRpb249Ijk2LjAiCiAgIHBob3Rvc2hvcDpDb2xvck1vZGU9IjMiCiAgIHBob3Rvc2hvcDpJQ0NQcm9maWxlPSJzUkdCIElFQzYxOTY2LTIuMSIKICAgeG1wOk1vZGlmeURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJwcm9kdWNlZCIKICAgICAgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWZmaW5pdHkgRGVzaWduZXIgMS4xMC4xIgogICAgICBzdEV2dDp3aGVuPSIyMDIyLTAzLTMxVDEwOjUwOjIzKzAyOjAwIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwveG1wTU06SGlzdG9yeT4KICA8L3JkZjpEZXNjcmlwdGlvbj4KIDwvcmRmOlJERj4KPC94OnhtcG1ldGE+Cjw/eHBhY2tldCBlbmQ9InIiPz5V57uAAAABgmlDQ1BzUkdCIElFQzYxOTY2LTIuMQAAKJF1kc8rRFEUxz9maORHo1hYKC9hISNGTWwsRn4VFmOUX5uZZ36oeTOv954kW2WrKLHxa8FfwFZZK0WkZClrYoOe87ypmWTO7dzzud97z+nec8ETzaiaWd4NWtYyIiNhZWZ2TvE946WZSjqoj6mmPjE1HKWkfdxR5sSbgFOr9Ll/rXoxYapQVik8oOqGJTwqPL5i6Q5vCzeo6dii8KlwpyEXFL519LjLLw6nXP5y2IhGBsFTJ6ykijhexGra0ITl5bRqmWU1fx/nJTWJ7PSUxBbxJkwijBBGYYwhBgnRQ7/MIQIE6ZIVJfK7f/MnyUmuKrPOKgZLpEhj0SnqslRPSEyKnpCRYdXp/9++msneoFu9JgwVT7b91ga+LfjetO3PQ9v+PgLvI1xkC/m5A+h7F32zoLXug38dzi4LWnwHzjeg8UGPGbFfySvuSSbh9QRqZ6H+Gqrm3Z7l9zm+h+iafNUV7O5Bu5z3L/wAdthn7QIme0YAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAJTSURBVFiF7Zi9axRBGIefEw2IdxFBRQsLWUTBaywSK4ubdSGVIY1Y6HZql8ZKCGIqwX/AYLmCgVQKfiDn7jZeEQMWfsSAHAiKqPiB5mIgELWYOW5vzc3O7niHhT/YZvY37/swM/vOzJbIqVq9uQ04CYwCI8AhYAlYAB4Dc7HnrOSJWcoJcBS4ARzQ2F4BZ2LPmTeNuykHwEWgkQGAet9QfiMZjUSt3hwD7psGTWgs9pwH1hC1enMYeA7sKwDxBqjGnvNdZzKZjqmCAKh+U1kmEwi3IEBbIsugnY5avTkEtIAtFhBrQCX2nLVehqyRqFoCAAwBh3WGLAhbgCRIYYinwLolwLqKUwwi9pxV4KUlxKKKUwxC6ZElRCPLYAJxGfhSEOCz6m8HEXvOB2CyIMSk6m8HoXQTmMkJcA2YNTHm3congOvATo3tE3A29pxbpnFzQSiQPcB55IFmFNgFfEQeahaAGZMpsIJIAZWAHcDX2HN+2cT6r39GxmvC9aPNwH5gO1BOPFuBVWAZue0vA9+A12EgjPadnhCuH1WAE8ivYAQ4ohKaagV4gvxi5oG7YSA2vApsCOH60WngKrA3R9IsvQUuhIGY00K4flQG7gHH/mLytB4C42EgfrQb0mV7us8AAMeBS8mGNMR4nwHamtBB7B4QRNdaS0M8GxDEog7iyoAguvJ0QYSBuAOcAt71Kfl7wA8DcTvZ2KtOlJEr+ByyQtqqhTyHTIeB+ONeqi3brh+VgIN0fohUgWGggizZFTplu12yW8iy/YLOGWMpDMTPXnl+Az9vj2HERYqPAAAAAElFTkSuQmCC"
        type="image/png">

    <link rel="stylesheet" href="{{ asset('/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/compiled/css/table-datatable.css') }}">
    <link rel="stylesheet" href="{{ asset('/compiled/css/app.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('/compiled/css/app-dark.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('/extensions/choices.js/public/assets/styles/choices.css') }}">
</head>

<body>
    <script src="{{ asset('/static/js/initTheme.js') }}"></script>
    @include('sweetalert::alert')
    <div id="app">
        @include('dashboard.layouts.sidebar')
        <div id="main">
            @yield('container')
            @include('dashboard.layouts.footer')
        </div>
    </div>
    <script src="{{ asset('/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('/compiled/js/app.js') }}"></script>
    <script src="{{ asset('/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('/static/js/pages/simple-datatables.js') }}"></script>
    <script src="{{ asset('/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
    <script src="{{ asset('/static/js/pages/form-element-select.js') }}"></script>

    <!-- Need: Apexcharts -->
    <script src="{{ asset('/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('/static/js/pages/dashboard.js') }}"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs5-lightbox@1.8.3/dist/index.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#table1').dataTable({
                scrollX: true,
            });
        });
        var i = 0;
        $("#dynamic-ar").click(function () {
            ++i;
            $("#dynamicAddRemove").append(
                '<div class="col-6 mb-3 form-baru"><div class="form-group"><label class="mb-2" for="first-name-column">Kode</label><input type="text" class="form-control mb-3" id="code" name="addMoreInputFields[' + i + '][code]" placeholder="Kode Alternatif..."><label class="mb-2" for="first-name-column">Nama Alternatif</label><input type="text" class="form-control" id="name" name="addMoreInputFields[' + i + '][name]" placeholder="Nama Alternatif..."></div><button type="button" class="btn btn-outline-danger me-1 mb-1 remove-input-field">Delete</button></div>'
            );
        });
        $(document).on('click', '.remove-input-field', function () {
            $(this).parents('.form-baru').remove();
        });
        $("#dynamic-ar-2").click(function () {
            ++i;
            $("#dynamicAddRemove2").append(
                '<div class="col-6 mb-3 form-baru"><div class="form-group"><label class="mb-2" for="first-name-column">Kode</label><input type="text" class="form-control mb-3" id="code" name="addMoreInputFields[' + i + '][code]" placeholder="Kode Kriteria..."><label class="mb-2" for="first-name-column">Nama Kriteria</label><input type="text" class="form-control mb-3" id="name" name="addMoreInputFields[' + i + '][name]" placeholder="Nama Kriteria..."><label for="first-name-column">Tipe Kriteria</label><select class="form-select mb-3" id="type" name="addMoreInputFields[' + i + '][type]"><option selected>Pilih...</option><option value="benefit">Benefit</option><option value="cost">Cost</option></select><label class="mb-2" for="first-name-column">Nilai Bobot</label><input type="text" class="form-control mb-3" id="weight" name="addMoreInputFields[' + i + '][weight]" placeholder="Nilai Bobot..."></div><button type="button" class="btn btn-outline-danger me-1 mb-1 remove-input-field">Delete</button></div>'
            );
        });
        $(document).on('click', '.remove-input-field', function () {
            $(this).parents('.form-baru').remove();
        });
        $("#dynamic-ar-3").click(function () {
            ++i;
            $("#dynamicAddRemove3").append(
                '<div class="col-6 mb-3 form-baru"><div class="form-group"><label class="mb-2" for="first-name-column">Alternatif</label><select class="form-select mb-3" id="alternatif_id" name="addMoreInputFields[' + i + '][alternatif_id]"><option selected>Pilih...</option>@foreach ($alternatifs as $alternatif)<option value="{{ $alternatif->id }}">{{ $alternatif->code }}</option>@endforeach</select><label for="first-name-column" class="mb-2">Kriteria</label><select class="form-select mb-3" id="kriteria_id" name="addMoreInputFields[' + i + '][kriteria_id]"><option selected>Pilih...</option>@foreach ($kriterias as $kriteria)<option value="{{ $kriteria->id }}">{{ $kriteria->code }}</option>@endforeach</select><label for="first-name-column" class="mb-2">Nilai</label><input type="text" class="form-control mb-3" id="value" name="addMoreInputFields[' + i + '][value]" placeholder="Nilai..."></div><button type="button" class="btn btn-outline-danger me-1 mb-1 remove-input-field">Delete</button></div>'
            );
        });
        $(document).on('click', '.remove-input-field', function () {
            $(this).parents('.form-baru').remove();
        });
    </script>

</body>

</html>
