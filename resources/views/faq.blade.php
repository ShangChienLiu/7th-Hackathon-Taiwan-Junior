@extends('layouts.master')
@extends('layouts.navbar')
@include('layouts.header')
@section('title')
    常見問題 FAQ
@endsection
@section('intro')
    <h2>常見問題</h2>
@endsection
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/faq.css') }}">
    <script src="{{ asset('assets/js/faq.js') }}"></script>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
@endsection
@section('background') https://url.chyanweb.com/e3a @endsection
@section('content')
    <script>
        window.onload = function() {
            document.getElementById('one').click();
        }
    </script>
    <div class="container">
        <section class="wrapper style1 special fade-up">
            <header class="major">
                <h2>常見問題</h2>
            </header>
            <div class="row">
                <div class="col-6 btn-div">
                    <a class="animate__animated animate__slideInLeft animate__faster button" type="button"
                        onclick="open_box('question-rent')">電腦租借</a>
                </div>
                <div class="col-6">
                    <a class="animate__animated animate__slideInRight animate__faster button" type="button"
                        onclick="open_box('question-volunteer')">志工服務</a>
                </div>
            </div>
            <div class="box alt animate__animated animate__lightSpeedInLeft" id="question-rent" style="display: none">
                <div class="row gtr-uniform">
                    <section class="col-8 box-question">
                        <span class="icon solid major fa-chalkboard"></span>
                        <h3>電腦租借服務 - 常見問題</h3>
                        <details>
                            <summary>
                                如果我的電腦借出有損害可以獲得賠償嗎？
                            </summary>
                            <div class="box-content">
                                <p>在每次出借前，我們都會替電腦檢查，若是借出過程中有損壞，我們都會幫您修復。</p>
                            </div>
                        </details>
                        <details>
                            <summary>
                                借出後想再拿回電腦，要如何申請呢？
                            </summary>
                            <div class="box-content">
                                <p>隨時都可以與我們聯絡，若是電腦在借出中，則會等到該租期結束再退還。</p>
                            </div>
                        </details>
                        <details>
                            <summary>
                                租借電腦有任何限制嗎？
                            </summary>
                            <div class="box-content">
                                <p>我們的服務對象主要針對弱勢群體提供，對象為持有中低收入戶、身心障礙證明的學生或年長者，需提供相關證明。</p>
                            </div>
                        </details>
                        <details>
                            <summary>
                                租借電腦可以指定嗎？
                            </summary>
                            <div class="box-content">
                                <p>為達到最有效率的分配，不提供指定設備服務。</p>
                            </div>
                        </details>
                    </section>
                </div>
            </div>
            <div class="box alt animate__animated animate__lightSpeedInRight" id="question-volunteer" style="display: none">
                <div class="row gtr-uniform">
                    <section class="col-8 box-question">
                        <span class="icon solid major fa-hands-helping"></span>
                        <h3>志工服務 - 常見問題</h3>
                        <details>
                            <summary>
                                擔任志工有任何條件限制嗎？
                            </summary>
                            <div class="box-content">
                                <p>任何有意願的人，只要經過我們組織的培訓並通過甄試，都可以擔任。</p>
                            </div>
                        </details>
                        <details>
                            <summary>
                                擔任志工可獲得任何報酬嗎？
                            </summary>
                            <div class="box-content">
                                <p>若是學生可以獲得服務時數的獎勵，若不為學生則能夠累計教學時數，未來能夠用教學時數兌換獎學金給弱勢學生。</p>
                            </div>
                        </details>
                        <details>
                            <summary>
                                服務的地點是如何分配呢？
                            </summary>
                            <div class="box-content">
                                <p>我們會自動安排最方便的地點，不讓您覺得困擾，也有線上的模式讓您不用出門也可以服務。</p>
                            </div>
                        </details>
                        <details>
                            <summary>
                                任何人都可以申請志工服務嗎？
                            </summary>
                            <div class="box-content">
                                <p>只要您有需求，就會盡全力達成，但會優先將資源留給弱勢族群。</p>
                            </div>
                        </details>
                        <details>
                            <summary>
                                除了擔任志工外，可以捐助金錢嗎？
                            </summary>
                            <div class="box-content">
                                <p>我們非常樂意您捐助愛心，在首頁末端有捐贈的按鈕可捐款，所有捐款額我們都會用改善弱勢群體的教育。</p>
                            </div>
                        </details>
                    </section>
                </div>
            </div>
        </section>

    </div>
@endsection

@include('layouts.footer')
