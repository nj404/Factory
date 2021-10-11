<style>
#container_camera {margin:0 auto;padding:0;text-align:center;vertical-align:middle}
#camera {border:1px solid #ff0000;box-shadow:2px 2px 3px black}
#recorded {border:1px solid #00ff00;box-shadow:2px 2px 3px black}
.btn {
	width:10em;
	font-size:10pt;
	color:rgba(255,255,255,.9);
	text-shadow:#2e7ebd 0 1px 2px;
	text-align:center;
	padding:.7em 0;
	border:1px solid;
	border-color:#60a3d8 #2970a9 #2970a9 #60a3d8;
	border-radius:6px;
	background:#60a3d8 linear-gradient(#89bbe2,#60a3d8 50%,#378bce);
	box-shadow:inset rgba(255,255,255,.5) 1px 1px
}
.btn:hover {color:rgb(255,255,255);background-image:linear-gradient(#9dc7e7,#74afdd50%,#378bce);cursor:pointer}
.btn:active {color:rgb(255,255,255);border-color:#2970a9;background-image:linear-gradient(#5796c8,#6aa2ce);box-shadow: none}
</style>
<div id="container">
	<div id="container_camera">
		<p style="color:#0000ff">Відеонагляд за складом №2</p>
		<video id="camera" autoplay playsinline muted></video>&nbsp;&nbsp;&nbsp;<video id="recorded" playsinline loop></video>
		<br /><br /><div>
			<button class="btn" id="VideoOn">Ввімкнути камеру</button>
			<button class="btn" style="display:none" id="save">Ввімкнути запис</button>
			<button class="btn" style="display:none" id="play">Переглянути</button>
			<button class="btn" style="display:none" id="download">Завантажити</button>
		</div>
	</div>	
</div>
<script type="text/javascript">
// интерфейс для предоставления интерактивного источника медиаданных объектам типа HTMLMediaElement
const mediaSource = new MediaSource();
// устанавливаем событие вызываемое при создании источника медиаданных
mediaSource.addEventListener('sourceopen', handleSourceOpen, false);
let mediaRecorder;
let recordedBlobs;
let sourceBuffer;

const video = window.video = document.querySelector('#camera');
video.width = 320;
video.height = 240;
const recorded = document.querySelector('#recorded');
recorded.width = video.width;
recorded.height = video.height;

const recordedButton = document.querySelector('#save');
const playButton = document.querySelector('#play');
const downloadButton = document.querySelector('#download');
recordedButton.onclick = function()
{
	if(recordedButton.textContent === 'Ввімкнути запис')
	{
		startRecording();
	} else
	{
		stopRecording();
		recordedButton.textContent = 'Ввімкнути запис';
		playButton.style.display = "none";
		downloadButton.style.display = "none";
	}
}
playButton.onclick = function()
{
	// Объект Blob представляет из себя объект наподобие файла с неизменяемыми, необработанными данными
	// Возвращает только что созданный Blob объект, содержимое которого состоит из конкатенации массива значений, переданного через параметр.
	const superBuffer = new Blob(recordedBlobs, {type: 'video/webm'});
	recorded.src = null;
	recorded.srcObject = null;
	//передаем содержимое массива Blob в блок <video> - там отображаем записанный источника медиаданных
	recorded.src = window.URL.createObjectURL(superBuffer);
	recorded.controls = true;
	recorded.play();
}
downloadButton.onclick = function()
{
	// Объект Blob представляет из себя объект наподобие файла с неизменяемыми, необработанными данными
	// Возвращает только что созданный Blob объект, содержимое которого состоит из конкатенации массива значений, переданного через параметр.
	const blob = new Blob(recordedBlobs, {type: 'video/webm'});
	const url = window.URL.createObjectURL(blob);
	const a = document.createElement('a');
	a.style.display = 'none';
	a.href = url;
	a.download = 'video.webm';
	document.body.appendChild(a);
	a.click();
	setTimeout(() => {
		document.body.removeChild(a);
		window.URL.revokeObjectURL(url);
		}, 100);
}
function startRecording()
{
	recordedBlobs = [];
	let options = {mimeType: 'video/webm;codecs=vp8'};
	// Возвращает Boolean значение показывающее поддерживается ли MIME тип текущим user agent
	if(!MediaRecorder.isTypeSupported(options.mimeType))
	{
		options = {mimeType: 'video/webm;codecs=vp9'};
		if(!MediaRecorder.isTypeSupported(options.mimeType))
		{
			options = {mimeType: 'video/webm'};
			if(!MediaRecorder.isTypeSupported(options.mimeType))
			{
				options = {mimeType: ''};
			}
		}
	}
	try
	{
		// интерфейс записи медиа (в параметрах задаем MIME контейнер и скорости передачи аудио-и видеодорожек)
		mediaRecorder = new MediaRecorder(window.stream, options);
	} catch(e)
	{
		console.error('Exception while creating MediaRecorder:', e);
		return;
	}
	recordedButton.textContent = 'Выключить запись';
	playButton.style.display = "inline";
	downloadButton.style.display = "inline"
	// устанавливаем событие, которое запускается раз в timeslice миллисекунд (или, если timeslice не был задан - по окончанию записи)
	mediaRecorder.ondataavailable = handleDataAvailable;
	// Начинает запись медиа В этот метод можно передать аргумент timeslice со значением в миллисекундах.
	// Если он определен, то медиа будет записываться в отдельные блоки заданной продолжительности, вместо записи в один большой блок.
	mediaRecorder.start(10); // начать через 10ms
}
function stopRecording()
{
	// Останавливает запись, после чего запускается событие dataavailable, содержащее последний Blob сохраненных данных
	mediaRecorder.stop();
	console.log('Recorded Blobs: ', recordedBlobs);
}
function handleSourceOpen(event)
{
	console.log('MediaSource opened');
	// Создает новый объект типа SourceBuffer, с указанным  MIME-типом и добавляет в список MediaSource's SourceBuffers
	sourceBuffer = mediaSource.addSourceBuffer('video/webm; codecs="vp8"');
	console.log('Source buffer: ', sourceBuffer);
}
function handleDataAvailable(event)
{
	if(event.data && event.data.size > 0)
	{
		recordedBlobs.push(event.data);
	}
}
function handleSuccess(stream)
{
	recordedButton.style.display = "inline";
	window.stream = stream;
	video.srcObject = stream;
}
function handleError(error)
{
	console.log('navigator.getUserMedia error: ', error);
}
async function Init(e)
{
	try
	{
		// запрашиваем разрешение на доступ к поточному видео камеры
		const stream = await navigator.mediaDevices.getUserMedia({audio:false,video:true});
		handleSuccess(stream);
		e.target.disabled = true;
	} catch(e)
	{
		handleError(e);
	}
}
document.querySelector('#VideoOn').addEventListener('click', e => Init(e));
</script>