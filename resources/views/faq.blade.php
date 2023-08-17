<div class="faq p1">
    <div class="container">
        <h5 class="title-header">Вопрос-ответ</h5>
        
        <div class="accordion" id="accordionFaq">
            @foreach($questions as $question)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="question{{ $question->id }}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#answer{{ $question->id }}">
                            {{ $question->question }}
                        </button>
                    </h2>
                    <div id="answer{{ $question->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionFaq">
                        <div class="accordion-body">
                            <p class="mb-0">{{ $question->answer }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>