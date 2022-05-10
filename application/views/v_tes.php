<div class="wrapper">
    <div id="container">
        <div class="space">1</div>
        <div class="park">2</div>
        <div class="park">3</div>
        <div class="park">4</div>
        <div class="blank">5</div>
        <div class="park">6</div>
        <div class="park">7</div>
        <div class="park">8</div>
    </div>
</div>
<style>
.wrapper {
    display: flex;
    justify-content: center;
}

#container {
    width: 500px;
    height: 500px;
    background: url(tile.png);
    background-repeat: repeat;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-template-rows: 200px 1fr 200px;
}

.park {
    border: 2px dashed #fff;
    display: flex;
    justify-content: center;
}

.blank {
    grid-column-start: 1;
    grid-column-end: 5;
}

.car {
    max-width: 50px;
}
</style>
<script>
document.addEventListener("DOMContentLoaded", e => {
    let parks = [];
    const parkArea = document.getElementsByClassName("park");
    Array.from(parkArea).forEach(el => {
        el.innerHTML = `<img src="car.svg" class="car" alt="ditempati"/>`;
    });
    fetch("http://powermeter.onprojek.com/lantai1")
        .then(res => {
            return res.json();
        })
        .then(resJson => {
            console.log(resJson);
        })
        .catch(err => console.error(err))
})
</script>