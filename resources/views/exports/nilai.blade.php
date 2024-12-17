
@if($jawaban!=null)


<table>
    <thead>
        <tr >
            <th style="text-align: center;vertical-align: middle; border: 1px solid black;border-collapse: collapse;" rowspan="3">NAMA</th>
            <th style="text-align: center;vertical-align: middle;border: 1px solid black;border-collapse: collapse;" colspan="{{ $jml_soal[0]->jml_soal }}">MINDSET : {{ $mindset->nama_mindset }}</th>
            <th style="text-align: center;vertical-align: middle;border: 1px solid black;border-collapse: collapse;" rowspan="3">Skor Total</th>
            <th style="text-align: center;vertical-align: middle;border: 1px solid black;border-collapse: collapse;" rowspan="3">%</th>
        </tr>
        <tr>
            @foreach ($indikator as $row )
            <th style="text-align: center;vertical-align: middle;border: 1px solid black;border-collapse: collapse;" colspan="{{ $row->jml_soal }}">{{ $row->nama_indikator }}</th>
            @endforeach
        </tr>
        <tr>
            @foreach ($data_soal as $key=>$row1)
            <td style="text-align: center;vertical-align: middle;border: 1px solid black;border-collapse: collapse;">Soal {{ ++$key }}</td>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($jawaban as $row0)
        <tr>
            <td style="text-align: center;vertical-align: middle;border: 1px solid black;border-collapse: collapse;">{{ $row0['nama'] }}</td>
            <?php $i=1; ?>
            @while ($i<=$soal->count())

            <td style="text-align: center;vertical-align: middle;border: 1px solid black;border-collapse: collapse;">{{ $row0[$i] }}</td>
            <?php $i++; ?>
            @endwhile
            <td style="text-align: center;vertical-align: middle;border: 1px solid black;border-collapse: collapse;">{{ $row0['skor'] }}</td>
            <td style="text-align: center;vertical-align: middle;border: 1px solid black;border-collapse: collapse;">{{ $row0['persentase'] }}</td>
        </tr>
        @endforeach

    </tbody>
    <tfoot>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td> </td>
        </tr>

        @foreach($data_soal as $key => $row2)
        <tr>
            <td>soal {{ ++$key }}</td>
            <td colspan="10">{{ $row2->soal }}</td>

        </tr>

        @endforeach

    </tfoot>
</table>
{{-- @dd('ok') --}}

@else
<table>
    <tr>
        <td>Data masih kosong</td>
    </tr>
</table>

@endif

