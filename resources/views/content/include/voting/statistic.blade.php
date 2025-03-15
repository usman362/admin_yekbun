<div class="vote-detail-modal">
    <div class="vote-header">
        <div class="vote-name">{{ $vote->name }}</div>
    </div>
    <div class="p-2">
        <div class="community p-3">
            <div class="d-flex" style="color: #aaa">
                <div>Community</div>
                <div class="flex-fluid d-flex justify-content-end align-items-center">Total</div>
            </div>
            <div class="d-flex fw-bold" style="color: #333">
                <div>Reviews qualification</div>
                <div class="flex-fluid d-flex justify-content-end align-items-center total-reviews">{{ $total_reviews }}
                </div>
            </div>
            <div class="vote-reaction dislike d-flex align-items-center mt-4"
                style="width:{{ $total_reviews > 0 ? round(($total_dislikes * 100) / $total_reviews) : '10' }}%">

                @if (isset($vote->options[0]['image']))
                    <div>
                        <img src="{{ asset('storage/' . $vote->options[0]['image']) }}" style="height: 30px;" />
                    </div>
                @else
                    <div>
                        <svg width="31" height="31" viewBox="0 0 31 31" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M25.7791 11.5663L26.661 16.666C26.8813 17.9397 25.9018 19.1047 24.6105 19.1047H18.1342C17.4923 19.1047 17.0035 19.6809 17.1074 20.315L17.9358 25.3707C18.0703 26.192 18.0319 27.0325 17.8229 27.8381C17.6498 28.5054 17.1349 29.0413 16.4578 29.2588L16.2766 29.317C15.8673 29.4485 15.4207 29.4179 15.0348 29.232C14.6101 29.0273 14.2994 28.654 14.1843 28.2101L13.5896 25.9178C13.4004 25.1884 13.1248 24.4844 12.7695 23.8192C12.2503 22.8472 11.4476 22.0694 10.6132 21.3503L8.81474 19.8006C8.30767 19.3636 8.04137 18.7093 8.09908 18.042L9.11428 6.30112C9.2074 5.2242 10.1078 4.39746 11.1875 4.39746H16.9983C21.3499 4.39746 25.0637 7.42947 25.7791 11.5663Z"
                                fill="#fff" />
                            <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                                d="M4.15148 20.0413C4.65306 20.063 5.08266 19.6857 5.12591 19.1855L6.34041 5.13982C6.41842 4.23758 5.70775 3.45996 4.80028 3.45996C3.94551 3.45996 3.25439 4.15339 3.25439 5.00653V19.1047C3.25439 19.6068 3.6499 20.0197 4.15148 20.0413Z"
                                fill="#fff" />
                        </svg>
                    </div>
                @endif
                @if ($total_dislikes > 0)
                    <div class="flex-fluid d-flex justify-content-end align-items-center count">{{ $total_dislikes }}
                    </div>
                @endif
            </div>
            <div class="vote-reaction noIdea d-flex align-items-center mt-2"
                style="width:{{ $total_reviews > 0 ? round(($total_neutrals * 100) / $total_reviews) : '10' }}%">

                @if (isset($vote->options[1]['image']))
                    <div>
                        <img src="{{ asset('storage/' . $vote->options[1]['image']) }}" style="height: 30px;" />
                    </div>
                @else
                    <div>
                        <svg width="31" height="31" viewBox="0 0 31 31" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M3.01367 15.4048C3.01367 21.2973 3.01367 24.2436 4.84425 26.0742L26.1831 4.73537C24.3525 2.90479 21.4062 2.90479 15.5137 2.90479C9.62112 2.90479 6.67484 2.90479 4.84425 4.73537C3.01367 6.56595 3.01367 9.51223 3.01367 15.4048Z"
                                fill="#1BC469" />
                            <path
                                d="M10.5137 6.34229C11.0314 6.34229 11.4512 6.76202 11.4512 7.27979L11.4512 9.46731H13.6387C14.1564 9.46731 14.5762 9.88704 14.5762 10.4048C14.5762 10.9226 14.1564 11.3423 13.6387 11.3423H11.4512L11.4512 13.5298C11.4512 14.0476 11.0314 14.4673 10.5137 14.4673C9.9959 14.4673 9.57617 14.0476 9.57617 13.5298L9.57617 11.3423H7.38867C6.87091 11.3423 6.45117 10.9226 6.45117 10.4048C6.45117 9.88704 6.8709 9.46731 7.38867 9.46731H9.57617V7.27979C9.57617 6.76202 9.99591 6.34229 10.5137 6.34229Z"
                                fill="white" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M15.5137 27.9048C9.6211 27.9048 6.67482 27.9048 4.84424 26.0742L26.1831 4.73535C28.0137 6.56593 28.0137 9.51221 28.0137 15.4048C28.0137 21.2973 28.0137 24.2436 26.1831 26.0742C24.3525 27.9048 21.4062 27.9048 15.5137 27.9048ZM23.0138 22.5924C23.5316 22.5924 23.9513 22.1727 23.9513 21.6549C23.9513 21.1371 23.5316 20.7174 23.0138 20.7174H16.7638C16.246 20.7174 15.8263 21.1371 15.8263 21.6549C15.8263 22.1727 16.246 22.5924 16.7638 22.5924H23.0138Z"
                                fill="#ED1C24" />
                        </svg>
                    </div>
                @endif
                @if ($total_neutrals > 0)
                    <div class="flex-fluid d-flex justify-content-end align-items-center count">{{ $total_neutrals }}
                    </div>
                @endif
            </div>
            <div class="vote-reaction like d-flex align-items-center mt-2"
                style="width:{{ $total_reviews > 0 ? round(($total_likes * 100) / $total_reviews) : '10' }}%">

                @if (isset($vote->options[2]['image']))
                    <div>
                        <img src="{{ asset('storage/' . $vote->options[2]['image']) }}" style="height: 30px;" />
                    </div>
                @else
                    <div>
                        <svg width="31" height="31" viewBox="0 0 31 31" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M25.7788 21.2912L26.6608 16.1914C26.881 14.9177 25.9015 13.7527 24.6103 13.7527H18.1339C17.4921 13.7527 17.0033 13.1766 17.1072 12.5424L17.9355 7.48674C18.0701 6.6654 18.0316 5.82496 17.8227 5.01937C17.6496 4.35201 17.1347 3.81615 16.4575 3.59862L16.2763 3.5404C15.8671 3.40894 15.4204 3.43953 15.0346 3.62545C14.6099 3.8301 14.2992 4.20338 14.184 4.64732L13.5894 6.93964C13.4002 7.669 13.1246 8.37303 12.7693 9.03823C12.2501 10.0102 11.4473 10.788 10.6129 11.5071L8.8145 13.0568C8.30743 13.4938 8.04113 14.1482 8.09883 14.8155L9.11404 26.5563C9.20716 27.6332 10.1075 28.46 11.1873 28.46H16.998C21.3496 28.46 25.0634 25.428 25.7788 21.2912Z"
                                fill="#fff" />
                            <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                                d="M4.15148 12.8163C4.65306 12.7947 5.08266 13.172 5.12591 13.6722L6.34041 27.7178C6.41842 28.6201 5.70775 29.3977 4.80028 29.3977C3.94551 29.3977 3.25439 28.7043 3.25439 27.8511V13.7529C3.25439 13.2509 3.6499 12.838 4.15148 12.8163Z"
                                fill="#fff" />
                        </svg>
                    </div>
                @endif
                @if ($total_likes > 0)
                    <div class="flex-fluid d-flex justify-content-end align-items-center count">{{ $total_likes }}
                    </div>
                @endif
            </div>
        </div>

        <div class='statistic mt-4 p-3'>
            <div>Statistics</div>
            <div class="d-flex age-and-gender mt-2">
                <div style="color:#333;font-weight:bold;">Age and gender</div>
                <div class="flex-fluid d-flex justify-content-end align-items-center">
                    <div class="gender male">Male</div>
                    <div class="gender female ms-4">Female</div>
                </div>
            </div>
            @foreach ($statistics as $index => $statistic)
                <div class="d-flex mt-3">
                    <div class="me-2">{{ $statistic['age'] }}</div>
                    <div class="flex-fluid d-flex justify-content-between align-items-center gap-3">
                        <div class="progress w-100" style="height:15px;">
                            <div class="progress-bar bg-primary" role="progressbar"
                                style="width: {{ ($statistic['male']['reviews'] * 100) / $statistic['max'] }}%"
                                aria-valuenow="{{ $statistic['male']['reviews'] }}" aria-valuemin="0"
                                aria-valuemax="{{ $statistic['max'] }}" data-toggle="tooltip" data-placement="bottom"
                                title="{{ number_format((($statistic['male']['reviews'] - $statistic['female']['reviews']) * 100) / $statistic['max'], 1) }}%">
                                <b>{{ number_format((($statistic['male']['reviews'] - $statistic['female']['reviews']) * 100) / $statistic['max'], 1) }}%</b>
                            </div>
                            <div class="progress-bar" role="progressbar"
                                style="width: {{ ($statistic['female']['reviews'] * 100) / $statistic['max'] }}%; background: pink;color:#000"
                                aria-valuenow="{{ $statistic['female']['reviews'] }}" aria-valuemin="0"
                                aria-valuemax="{{ $statistic['max'] }}" data-toggle="tooltip" data-placement="bottom"
                                title="{{ 100 - number_format((($statistic['male']['reviews'] - $statistic['female']['reviews']) * 100) / $statistic['max'], 1) }}%">
                                <b>{{ 100 - number_format((($statistic['male']['reviews'] - $statistic['female']['reviews']) * 100) / $statistic['max'], 1) }}%</b>
                            </div>
                        </div>
                        {{-- <small
                            class="fw-semibold">{{ number_format((($statistic['male']['reviews'] - $statistic['female']['reviews']) * 100) / $statistic['max'], 1) }}%</small> --}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
