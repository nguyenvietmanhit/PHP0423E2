// Lấy tham chiếu đến canvas và thiết lập ngữ cảnh vẽ
var canvas = document.getElementById("game");
var context = canvas.getContext("2d");

// Thiết lập các biến và đối tượng cần thiết
var player = {
  x: 300,
  y: 370,
  width: 30,
  height: 30,
  color: "red",
  speed: 10
};
var bullets = [];
var targets = [];

// Tạo hàm vẽ đối tượng người chơi
function drawPlayer() {
  context.fillStyle = player.color;
  context.fillRect(player.x, player.y, player.width, player.height);
}

// Tạo hàm vẽ đối tượng đạn
function drawBullet(bullet) {
  context.fillStyle = "black";
  context.fillRect(bullet.x, bullet.y, bullet.width, bullet.height);
}

// Tạo hàm vẽ đối tượng mục tiêu
function drawTarget(target) {
  context.fillStyle = "blue";
  context.fillRect(target.x, target.y, target.width, target.height);
}

// Tạo hàm di chuyển người chơi
function movePlayer(direction) {
  if (direction == "left") {
    player.x -= player.speed;
  }
  else if (direction == "right") {
    player.x += player.speed;
  }
}

// Tạo hàm bắn đạn
function shoot() {
  bullets.push({
    x: player.x + player.width / 2,
    y: player.y,
    width: 2,
    height: 10,
    color: "black",
    speed: 10
  });
}

// Tạo hàm di chuyển đạn
function moveBullets() {
  for (var i = 0; i < bullets.length; i++) {
    bullets[i].y -= bullets[i].speed;
    if (bullets[i].y < 0) {
      bullets.splice(i, 1);
      i--;
    }
  }
}

// Tạo hàm tạo đối tượng mục tiêu
function createTarget() {
  targets.push({
    x: Math.random() * (canvas.width - 20),
    y: 0,
    width: 20,
    height: 20,
    color: "blue",
    speed: 5
  });
}

// Tạo hàm di chuyển đối tượng mục tiêu
function moveTargets() {
  for (var i = 0; i < targets.length; i++) {
    targets[i].y
+= targets[i].speed;
if (targets[i].y > canvas.height) {
  targets.splice(i, 1);
  i--;
}
}
}

// Tạo hàm kiểm tra va chạm giữa đạn và mục tiêu
function checkCollision() {
for (var i = 0; i < bullets.length; i++) {
for (var j = 0; j < targets.length; j++) {
if (bullets[i].x < targets[j].x + targets[j].width &&
bullets[i].x + bullets[i].width > targets[j].x &&
bullets[i].y < targets[j].y + targets[j].height &&
bullets[i].y + bullets[i].height > targets[j].y) {
bullets.splice(i, 1);
i--;
targets.splice(j, 1);
j--;
}
}
}
}

// Tạo hàm vẽ lại màn hình
function redraw() {
context.clearRect(0, 0, canvas.width, canvas.height);
drawPlayer();
for (var i = 0; i < bullets.length; i++) {
drawBullet(bullets[i]);
}
for (var i = 0; i < targets.length; i++) {
drawTarget(targets[i]);
}
}