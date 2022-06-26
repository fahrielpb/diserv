@extends('layouts.front')

@section('title')
Shipping Cost
@endsection

@section('content')

<section class="section-name  padding-y-sm">
    <div class="container">

        <header class="section-heading">
            <h3 class="section-title">Shipping Cost</h3>
        </header><!-- sect-heading -->

        <div class="row">
            <main class="col-md-8">
                <div class="card">
                    <article class="card-body">
                        <header class="mb-4">
                            <h5 class="card-title">Choose Shipping Service</h5>
                        </header>
                        <form action="{{ url('shipping-cost') }}" method="get">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Province</label>
                                    <select id="province_destination" name="province_destination"
                                        class="custom-select form-control">
                                        <option value="" holder> Choose...</option>
                                        @foreach($provinces as $province)
                                            <option value="{{ $province->id }}">{{ $province->province }}</option>
                                        @endforeach
                                    </select>
                                </div> <!-- form-group end.// -->
                                <div class="form-group col-md-4">
                                    <label>City</label>
                                    <select id="destination" name="destination" class="custom-select form-control">
                                        <option value="" holder> Choose...</option>
                                    </select>
                                </div> <!-- form-group end.// -->
                            </div> <!-- form-row end.// -->

                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label>Delivery Service</label>
                                    <select id="courier" name="courier" class="custom-select form-control">
                                        <option value="" holder> Choose...</option>
                                        <option value="jne" holder>JNE</option>
                                        <option value="tiki" holder>TIKI</option>
                                        <option value="pos" holder>POS INDONESIA</option>
                                    </select>
                                </div> <!-- form-group end.// -->
                            </div> <!-- form-row end.// -->

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <button type="submit" class="btn btn-primary">Check</button>
                                </div>
                            </div>
                        </form>
                        @if($cekongkir)
                            <div class="row">
                                <div class="col">
                                    <table class="table table-striped table-bordered table-hovered" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Service</th>
                                                <th>Description</th>
                                                <th>Cost</th>
                                                <th>Estimate</th>
                                                {{-- <th>Note</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($cekongkir as $result)
                                                <tr>
                                                    <td>{{ $result['service'] }}</td>
                                                    <td>{{ $result['description'] }}</td>
                                                    <td>Rp {{ $result['cost'][0]['value'] }}
                                                    </td>
                                                    <td>{{ $result['cost'][0]['etd'] }} days
                                                    </td>
                                                    {{-- <td>{{ $result['cost'][0]['note'] }}
                                                    </td> --}}
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @else
                        @endif
                    </article> <!-- card-body end .// -->
                </div> <!-- card.// -->

        </div> <!-- container // -->
        </main> <!-- col.// -->
    </div>

</section>
@endsection

@section('scripts')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script> --}}

<script type="text/javascript">
    $(document).ready(function () {
        $('select[name="province_destination"]').on('change', function () {
            var cityId = $(this).val();
            if (cityId) {
                $.ajax({
                    url: 'getCity/ajax/' + cityId,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="destination"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="destination"]').append(
                                '<option value="' +
                                key + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="destination"]').empty();
            }
        });
    });
</script>
@endsection