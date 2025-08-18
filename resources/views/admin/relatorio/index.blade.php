@extends('templates/subcategorias_layout')
@section('content')
    <div class="container py-4">
        <h2 class="mb-4">Relatório Geral</h2>
        <div class="row mb-5">
            <div class="col-md-12">
                <canvas id="relatorioBarChart" height="100"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h4>Dados de Empréstimos</h4>
                <a href="{{ route('relatorio.emprestimos.pdf') }}" class="btn btn-danger mb-3" target="_blank">Baixar PDF dos
                    Empréstimos</a>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Usuário</th>
                                <th>Material</th>
                                <th>Data de Empréstimo</th>
                                <th>Data de Devolução</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($emprestimos as $emprestimo)
                                <tr>
                                    <td>{{ $emprestimo->id }}</td>
                                    <td>{{ $emprestimo->user->nome ?? '-' }}</td>
                                    <td>{{ $emprestimo->material->titulo ?? '-' }}</td>
                                    <td>{{ $emprestimo->data_de_retirada }}</td>
                                    <td>{{ $emprestimo->data_de_devolucao }}</td>
                                    <td>{{ $emprestimo->status_emprestimo }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const dadosGrafico = [@json($emprestimosCount), @json($materiaisCount), @json($usuariosCount)];
        console.log('Dados do gráfico:', dadosGrafico);
        const ctx = document.getElementById('relatorioBarChart').getContext('2d');
        const relatorioBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Empréstimos', 'Materiais', 'Usuários'],
                datasets: [{
                    label: 'Quantidade',
                    data: dadosGrafico,
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)',
                        'rgba(75, 192, 192, 0.7)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false },
                    tooltip: { enabled: true }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100
                    }
                }
            }
        });
    });
    </script>
@endsection
