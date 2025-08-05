@extends('templates/registro_de_material_layout')
@section('content')
    <div class="container py-5">
        <header class="mb-4">
            <h1 class="h4 fw-bold">Solicitar Empréstimo</h1>
        </header>

        <main class="bg-light p-4 rounded shadow">
            <div class="row g-4">
                <!-- Imagem -->
                <div class="col-lg-4">
                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuBNTv6ztljE-7E_dBkhoAriomjUKwS_5NbzJ2XyMEvrViVnNZdKdqJXWJNaaZpO-IkVtVNzflwqHMIZVafFovGxdy5XjB6ru2qbjYCg3cIFIJwtgDsV_ovSnAgPGn_Xk3gB_7VV9EqoHQiIJE2h2Tt_xd4fYzgdiUIZI0G5eH97ZTIewBJ8XlC35LEvEVEDtPn5uV8hzqmk8sF_8dWQBC4RKBuaZmMonS0cLMdO2pvhWOn_HP99CdHhmmWB2C7HJr1qPrj1R9baW-4"
                        alt="Uma mão alcançando um livro chamado 'NUTUK' em uma estante." class="img-cover">
                </div>

                <!-- Formulário -->
                <div class="col-lg-8">
                    <h2 class="h5 fw-semibold text-center mb-4">Solicitar empréstimo de um material</h2>
                    <form action="{{ route('emprestimos.solicitar') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <select name="material_id" id="material_id" class="form-control">
                                <option value="">-- Selecione um Material --</option>
                                @foreach ($materiais as $material)
                                    <option value="{{ $material->id }}">{{ $material->titulo }}</option>
                                @endforeach
                            </select>

                            <div id="disponibilidade_msg" class="mt-2 text-sm fw-bold"></div>

                            <div class="col-12 d-flex flex-column flex-md-row align-items-start gap-3">
                                <div class="col-md-6">
                                    <label>Data de Retirada:</label>
                                    <input type="date" name="data_de_retirada" class="form-control">
                                </div>

                                <div class="col-md-6">
                                    <label>Data de Devolução:</label>
                                    <input type="date" name="data_de_devolucao" class="form-control">
                                </div>
                            </div>

                        </div>

                        <div class="mt-4 text-end">
                            <button type="submit" class="btn btn-dark px-4">Solicitar empréstimo</button>
                        </div>
                    </form>
                </div>

            </div>
        </main>
    </div>
@endsection
