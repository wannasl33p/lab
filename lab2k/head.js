
function updateClock(){
    const [time, ampm] = HowTimeIsNow();
    console.log(time, ampm);
    const selectors = [document.querySelectorAll('.hour-1 .hour'),
    document.querySelectorAll('.hour-2 .hour'),
    document.querySelectorAll('.minutes-1 .hour'),
    document.querySelectorAll('.minutes-2 .hour'), ];
    const afterTimer = document.querySelectorAll('.ampm .hour')
    selectors.forEach(group => {
        group.forEach(img => {
            img.style.display = 'none'; 
        });
    });
    afterTimer.forEach(img => {
        img.style.display = 'none'; 
    });
    time.split('').forEach((element, index) => {
        selectors[index].forEach((img, i) => {
            if (i == element) {
                img.style.display = 'flex';
            }
        });
    });
    ampm ? afterTimer[0].style.display = 'flex': afterTimer[1].style.display = 'flex';
    
}

function HowTimeIsNow() {
    let date = new Date();
    let hours = (date.getHours() % 12 || 12) > 9 ? String(date.getHours() % 12 || 12) : '0' + (date.getHours() % 12 || 12);
    let minutes = ('0' + date.getMinutes()).slice(-2); 
    let ampm = date.getHours() >= 12 ? true : false;
    time = hours + minutes;
    return [time, ampm];
}
updateClock();
setInterval(updateClock, 1000);
