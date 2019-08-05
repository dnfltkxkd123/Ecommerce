const form = document.getElementById('vote-form');

form.addEventListener('submit',(e)=>{
	const choice = document.querySelector('input[name=os]:checked').value

	const data = { os:choice };

	fetch('http://localhost:3000/poll',{//http://localhost:3000/poll
		method:'post',
		body:JSON.stringify(data),
		headers:new Headers({
			'Content-Type':'application/json'
		})
	})
	.then(res => res.json())
	.then(data => console.log(data))
	.catch(err => console.log(err))
	e.preventDefault();
})



Pusher.logToConsole = true;

var pusher = new Pusher('d6e789b61d29e121590a', {
     cluster: 'ap3',
     forceTLS: true
});

var channel = pusher.subscribe('os-poll');
channel.bind('os-vote', function(data) {
     alert(JSON.stringify(data));
});