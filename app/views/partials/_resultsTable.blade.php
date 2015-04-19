<table class="striped results-table">
    <thead>
        <tr>
            <th data-field="date">Date Taken</th>
            <th data-field="status">Status</th>
            <th data-field="result">Result</th>
            <th data-field="pass-fail">Pass / Fail</th>
        </tr>
    </thead>

    <tbody>
        
        @foreach ($currentUser->tests->sortByDesc('created_at') as $test) 

            <tr>
                <td>{{ date("d F Y",strtotime($test->created_at)) }}</td>
                <td>
                @if (Helpers\TestAction::isFinished($test))
                    <span class="status completed">completed</span>
                @else
                    <span class="status not-completed">not completed<span> ({{ Helpers\TestAction::countLeftQuestions($test) }} left)</span></span>
                @endif
               </td>
                <td>{{ round((Helpers\TestAction::getResult($test) / 27)*100) }}%</td>
                <td>

                    @if(Helpers\TestAction::isFinished($test))

                        @if (Helpers\TestAction::getResult($test) >= 21)

                            <span class="pass"><i class="small mdi-action-thumb-up"></i></span>

                        @else 

                            <span class="fail"><i class="small mdi-action-thumb-down"></i></span>

                        @endif

                    @else

                        <span>N/A</span>

                    @endif

                </td>
            </tr>
                
        @endforeach

    </tbody>
</table>