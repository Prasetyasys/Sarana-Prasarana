@extends('layouts.pengawasMain')

@section('content')
    <style>
        .approval-actions {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            display: flex;
            gap: 0.75rem;
            z-index: 10;
        }

        .btn-approval {
            padding: 0.625rem 1.25rem;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.875rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .btn-approve {
            background: linear-gradient(145deg, #4ade80, #22c55e);
            color: white;
        }

        .btn-approve:hover {
            background: linear-gradient(145deg, #22c55e, #16a34a);
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            animation: pulse 1.5s infinite;
        }

        .btn-reject {
            background: linear-gradient(145deg, #f87171, #ef4444);
            color: white;
        }

        .btn-reject:hover {
            background: linear-gradient(145deg, #ef4444, #dc2626);
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-icon {
            font-size: 1.25rem;
        }

        @media (max-width: 768px) {
            .approval-actions {
                position: relative;
                top: 0;
                right: 0;
                justify-content: flex-end;
                margin-bottom: 1rem;
            }

            .btn-approval {
                padding: 0.5rem 1rem;
                font-size: 0.75rem;
            }

            .btn-icon {
                font-size: 1rem;
            }
        }

        .btn-approval:active {
            transform: scale(0.95);
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(74, 222, 128, 0.4);
            }

            70% {
                box-shadow: 0 0 0 10px rgba(74, 222, 128, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(74, 222, 128, 0);
            }
        }
    </style>

    <div class="card">
        <div class="card-header position-relative">
            <h4 class="card-title">Pengadaan: {{ $permintaan->code }}</h4>

            <div class="approval-actions">
                <form action="{{ route('permintaan.finish') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $permintaan->code }}">
                    <button class="btn-approval btn-approve">
                        Setujui
                    </button>
                </form>
                <form action="{{ route('permintaan.reject') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $permintaan->code }}">
                    <button class="btn-approval btn-reject">
                        Tolak
                    </button>
                </form>
            </div>
        </div>

        <div class="card-body mt-4">
            @foreach ($dpermintaan as $dpmt)
                <div class="comment">
                    <div class="comment-header">
                        <div class="pr-50">
                            <div class="avatar avatar-2xl">
                                <img src="../assets/compiled/jpg/banana.jpg" alt="Avatar">
                            </div>
                        </div>
                        <div class="comment-body">
                            <div class="comment-profileName">Nama Barang: {{ $dpmt->item->name }}</div>
                            <div class="comment-profileName">
                                Jumlah Pemintaan: {{ $dpmt->quantity }}
                            </div>
                            <div class="comment-profileName">
                                @if ($dpmt->quantity_approved == -1)
                                    Belum diproses
                                @elseif ($dpmt->quantity_approved == 0)
                                    Jumlah barang yang diterima : -
                                @elseif ($dpmt->quantity_approved > 0)
                                    Jumlah barang yang diterima : {{ $dpmt->quantity_approved }}
                                @elseif ($dmpt->quantity_approved < 0 )
                                    Jumlah barang yang diterima : Ditolak
                                @endif
                            </div>
                            <div class="comment-actions">
                                <button type="button" class="btn icon icon-left btn-primary me-2 text-nowrap"
                                    data-bs-toggle="modal" data-bs-target="#requestProcess">
                                    <i class="bi bi-gear-wide-connected"></i> Process
                                </button>
                                {{-- <button class="btn icon icon-left btn-warning me-2 text-nowrap">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </button> --}}
                                {{-- <button class="btn icon icon-left btn-danger me-2 text-nowrap">
                                    <i class="bi bi-x-circle"></i> Decline
                                </button> --}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @include('modal.prosesPermintaan')
@endsection
