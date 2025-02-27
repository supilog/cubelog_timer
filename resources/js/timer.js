const timer = {
    // property
    timerText: '',
    startTime: 0,
    elapsedTime: 0,
    intervalTimer: '',
    intervalTime: 47,
    status: 'neutral',  // neutral, prepare, ready, started
    scrambleText: '',
    result: '',
    modal: document.querySelector('.js-modal'),
    // 長押しタイマー
    timer: '',
    intervalTime: 17,
    startTime: 0,
    elapsedTime: 0,
    keyEvent: '',
    waitTime: 800,

    init: function () {
        // タイマー
        this.timerText = document.getElementById('timer');
        // イベントリスナー
        window.addEventListener('keydown', (event) => {
            this.prepare(event)
        }, false);
        window.addEventListener('keyup', () => {
            this.keyup()
        }, false);
        const btns = document.getElementsByClassName('modal-btn');
        btns[0].addEventListener('click', () => {
            this.store();
        }, false);
    },
    prepare: function (event) {
        // neutral時 -> 長押し処理
        if (this.status === 'neutral' && event.code === 'Space') {
            this.timerText.classList.add('wait');
            this.keyEvent = setTimeout(function () {
                this.ready();
            }.bind(this), this.waitTime);
        }
        // started時 -> 停止処理
        if (this.status === 'started' && event.code === 'Space') {
            // タイマーストップ
            clearInterval(this.timer);
            this.status = 'neutral';
            // モーダル表示
            this.modal.classList.add('is-active');
        }
    },
    ready: function (event) {
        if (this.status !== 'neutral') {
            return;
        }
        // 長押し完了時
        this.status = 'ready';
        this.timerText.textContent = '0.00';
        this.result = '';
        this.timerText.classList.remove('wait');
        this.timerText.classList.add('ready');
        this.scrambleText = document.getElementById('scramble').innerHTML;
    },
    keyup: function () {
        // started時は無視する
        if (this.status === 'started') {
            return;
        }
        // ready時
        if (this.status === 'ready') {
            this.status = 'started';
            this.startTime = Date.now();
            this.start();
        } else {
            this.status = 'neutral';
        }
        clearTimeout(this.keyEvent);
        this.timerText.classList.remove('wait');
        this.timerText.classList.remove('ready');
    },
    start: function () {
        this.timer = setInterval(function () {
            this.elapsedTime = Date.now() - this.startTime;
            let minutes = Math.floor((this.elapsedTime / 1000 / 60) % 60);
            let seconds = Math.floor((this.elapsedTime / 1000) % 60);
            let milliseconds = Math.floor((this.elapsedTime % 1000) / 10);
            if (minutes > 0) {
                this.timerText.textContent = String(minutes) + ':' + String(seconds).padStart(2, '0') + '.' + String(milliseconds).padStart(2, '0');
            } else {
                this.timerText.textContent = String(seconds) + '.' + String(milliseconds).padStart(2, '0');
            }
        }.bind(this), this.intervalTime);
    },
    store: function () {
        this.modal.classList.remove('is-active');
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "/api/store", true);
        xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

        // リクエスト
        xhr.send(JSON.stringify({
            scramble: this.scrambleText,
            solve_time: this.elapsedTime
        }));

        // レスポンス処理
        xhr.onload = function () {
            if (xhr.status == 200) {
                const jsonObj = JSON.parse(xhr.responseText);
                document.getElementById('scramble').innerHTML = jsonObj.scramble.text;
            } else {
                console.error("Error:", xhr.statusText);
            }
        };
    }
};

timer.init();


// 時間を表示する関数
// function start() {
//     intervalTimer = setInterval(function(){
//         elapsedTime = Date.now() - startTime;
//
//         let minutes = Math.floor((elapsedTime / 1000 / 60) % 60);
//         let seconds = Math.floor((elapsedTime / 1000) % 60);
//         let milliseconds = Math.floor((elapsedTime % 1000) / 10);
//         if(minutes > 0) {
//             time.textContent = String(minutes) + ':' + String(seconds).padStart(2, '0') + '.' + String(milliseconds);
//         } else {
//             time.textContent = String(seconds) + '.' + String(milliseconds);
//         }
//
//     }, intervalTime);
// }
//
// window.addEventListener('keydown', (event) => {
//     if (event.code === 'Space') {
//         // タイマーをセットする
//         key_ivent_timer_id = setTimeout(function () {
//             // キーが長押しされた時の処理
//             time.classList.add('start');
//         }, 1000); // 長押しと判定する時間（ミリ秒）
//     }
// });
//
// document.addEventListener('keyup', (event) => {
//     // 離されたキーを判定する
//     if (event.code === 'Space') {
//         // タイマーをクリアする
//         clearTimeout(key_ivent_timer_id);
//         time.classList.remove('start');
//     }
// });
//

