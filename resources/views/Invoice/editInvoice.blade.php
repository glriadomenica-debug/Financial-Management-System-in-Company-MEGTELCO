    @extends('layouts.main')

    @section('container')

    <div class="container mt-4">
        <div class="card shadow p-4">
        
            <form action="{{ route('invoice.update', rawurlencode($invoice->nu_ref)) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Naran Kliente</label>
                    <input type="text" class="form-control" name="naran" value="{{ $invoice->naran }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Residensia</label>
                    <input type="text" class="form-control" name="residensia" value="{{ $invoice->residensia }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskrisaun</label>
                    <table class="table" id="deskrisaunTable">
                        <thead>
                            <tr>
                                <th>Deskrisaun</th>
                                <th>Montante</th>
                                <th>Aksaun</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- <tr>
                                <td><input type="text" name="deskrisaun[]" class="form-control" value="Fornesimentu servisu Internet, {{ $kliente->pakote->pakote ?? 'Internet Services' }}" required></td>
                                <td><input type="number" name="montante[]" class="form-control" value="{{ $kliente->presu_pakote }}" required></td>
                                <td><button type="button" class="btn btn-danger removeRow">Hamoos</button></td>
                            </tr> --}}

                            @foreach(json_decode($invoice->deskrisaun, true) ?? [] as $desc)
                                <tr>
                                    <td><input type="text" name="deskrisaun[]" class="form-control" value="{{ $desc['text'] }}" required></td>
                                    <td><input type="number" name="montante[]" class="form-control" value="{{ $desc['montante'] }}" required></td>
                                    <td><button type="button" class="btn btn-danger removeRow">Hamoos</button></td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <button type="button" class="btn btn-success" id="addRow">+ Aumenta Koluna</button>
                </div>

                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-primary">Hadia</button>
                    <a href="{{ route('invoice.show', $invoice->nu_ref) }}" class="btn btn-secondary">Kansela</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById("addRow").addEventListener("click", function() {
            let table = document.getElementById("deskrisaunTable").getElementsByTagName('tbody')[0];
            let newRow = table.insertRow();
            newRow.innerHTML = `
                <td><input type="text" name="deskrisaun[]" class="form-control" required></td>
                <td><input type="number" name="montante[]" class="form-control" required></td>
                <td><button type="button" class="btn btn-danger removeRow">Hamoos</button></td>
            `;

            attachDeleteEvent();
        });

        function attachDeleteEvent() {
            document.querySelectorAll(".removeRow").forEach(button => {
                button.addEventListener("click", function() {
                    this.parentElement.parentElement.remove();
                });
            });
        }

        attachDeleteEvent();
    </script>

    @endsection
