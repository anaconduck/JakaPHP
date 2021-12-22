<div>
    <style wire:ignore>
        .menu {
            width: 30px;
        }

        .close {
            width: 20px;
            margin: 0 !important;
            padding: 0 !important;
        }

        .btn-close {
            border: none;
        }

        .btn-close:hover {
            background: none;
        }

        table tbody tr:hover {
            cursor: pointer;
            background-color: rgb(95, 95, 95) !important;
            color: white;
        }

        table tbody tr:hover p {
            color: white;
        }

        a.active {
            background-color: #535ba0 !important;
            color: white !important;
        }

        .search-box {
            width: fit-content;
            height: fit-content;
            position: relative;
            margin-right: 30px;
        }

        .search-box img {
            width: 20px !important;
            color: white
        }

        .input-search {
            height: 50px;
            width: 50px;
            border-style: none;
            padding: 10px;
            font-size: 18px;
            letter-spacing: 2px;
            outline: none;
            border-radius: 25px;
            transition: all .5s ease-in-out;
            background-color: #8bc3ff;
            padding-right: 40px;
            color: #000;
        }

        .input-search::placeholder {
            color: rgba(75, 75, 75, 0.5);
            font-size: 18px;
            letter-spacing: 2px;
            font-weight: 100;
        }

        .btn-search {
            width: 50px;
            height: 50px;
            border-style: none;
            font-size: 20px;
            font-weight: bold;
            outline: none;
            cursor: pointer;
            border-radius: 50%;
            position: absolute;
            right: 0px;
            color: #000;
            background-color: transparent;
            pointer-events: painted;
            padding: 0;
        }

        .btn-search:hover {
            background-color: #8bc3ff !important;
        }

        .btn-search:focus~.input-search {
            width: 300px;
            border-radius: 0px;
            background-color: transparent;
            border-bottom: 1px solid rgba(68, 68, 68, 0.5);
            transition: all 500ms cubic-bezier(0, 0.110, 0.35, 2);
        }

        .input-search:focus {
            width: 300px;
            border-radius: 0px;
            background-color: transparent;
            border-bottom: 1px solid rgba(20, 20, 20, 0.5);
            transition: all 500ms cubic-bezier(0, 0.110, 0.35, 2);
        }

        ol {
            list-style-type: upper-alpha;
        }

        tbody {
            text-align: justify;
        }

        p.teks {
            font-family: 'Roboto Slab', sans-serif !important;
            display: -webkit-box;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;
            max-width: 600px;
            overflow: hidden;
            text-overflow: ellipsis;
            height: 100px;
        }

    </style>

    <div wire:ignore class="page-heading">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1>Statistik Pengunjung</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="tables">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 mb-2">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2 text-muted">{{ $tahun }}</h6>
                            <p class="card-text">Jumlah Pengunjung dalam 1 Tahun Terakhir</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2 text-muted">{{ $bulan }}</h6>
                            <p class="card-text">Jumlah Pengunjung dalam 1 Bulan Terakhir</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2 text-muted">{{ $week }}</h6>
                            <p class="card-text">Jumlah Pengunjung dalam 1 Minggu Terakhir</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2 text-muted">{{ $day }}</h6>
                            <p class="card-text">Jumlah Pengunjung dalam 1 Hari Terakhir</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2 text-muted">{{ $hour }}</h6>
                            <p class="card-text">Jumlah Pengunjung dalam 1 Jam Terakhir</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
</div>
