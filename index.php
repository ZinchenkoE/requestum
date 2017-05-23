<?php
    require __DIR__ . "/model.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title</title>
	<link rel="stylesheet" href="/css/main.css">
</head>
<body>
    <header>
		<div class="container">
			<h2>Header</h2>
		</div>
    </header>
	<main>
		<ul class="productBox">
            <?php foreach (getItems(1, 4) as $item): ?>
				<li class="product">
					<div class="innerProductBox">
						<div class="imgBox">
							<img src="<?= $item['img']; ?>" alt="<?= $item['title']; ?>">
                            <?php if ($item['discountCost'] !== null): ?>
								<div class="label sale">Sale</div>
                            <?php endif; ?>
                            <?php if ($item['new']): ?>
								<div class="label new">New</div>
                            <?php endif; ?>
						</div>
						<div class="title"><?= $item['title']; ?></div>
						<div class="description"><?= $item['description']; ?></div>
						<div class="costBox">
							<span class="cost">$<?= $item['cost']; ?></span>
							<span class="discountCost"><?= isset($item['discountCost']) ? '$' . $item['discountCost'] : ''; ?></span>
						</div>
						<div class="btnBox">
							<button class="addToCart">add to cart</button>
							<button class="view">view</button>
						</div>
					</div>
				</li>
            <?php endforeach; ?>
		</ul>
		<button class="more">Load more</button>
		<div class="infoBox">
			<div class="info">
				<h3>hot offers</h3>
				<p class="text">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae. Suspendisse sollicitudin velit sed leo. Ut pharetra augue nec augue. Nam elit magna, hend.</p>
				<ul>
					<li>Vestibulum ante ipsum primis in faucibus orci luctus</li>
					<li>Nam elit magna hendrerit sit amet tincidunt ac</li>
					<li>Quisque diam lorem interdum vitae dapibus ac scele</li>
					<li>Donec eget tellus non erat lacinia fermentum</li>
					<li>Donec in velit vel ipsum auctor pulvin</li>
				</ul>
			</div>
			<div class="info">
				<h3>hot offers</h3>
				<p class="text">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae. Suspendisse sollicitudin velit sed leo. Ut pharetra augue nec augue. Nam elit magna, hend.</p>
				<ul>
					<li>Vestibulum ante ipsum primis in faucibus orci luctus</li>
					<li>Nam elit magna hendrerit sit amet tincidunt ac</li>
					<li>Quisque diam lorem interdum vitae dapibus ac scele</li>
					<li>Donec eget tellus non erat lacinia fermentum</li>
					<li>Donec in velit vel ipsum auctor pulvin</li>
				</ul>
			</div>
			<div class="info">
				<h3>Store information</h3>
				<div class="item">
					<div class="icon location"></div>
					<span class="contactText">Company Inc., 8901 Marmora Road, Glasgow, D04 89GR</span>
				</div>
				<div class="item">
					<div class="icon phone"></div>
					<span class="contactText">Call us now toll free: (800) 2345-6789</span>
				</div>
				<div class="item">
					<div class="icon mail"></div>
					<span class="contactText">Customer support: support@example.com Press: pressroom@example.com</span>
				</div>
				<div class="item">
					<div class="icon skype"></div>
					<span class="contactText">Skype: sample-username</span>
				</div>

			</div>
		</div>
	</main>
    <footer>
		<div class="container">
			<h2>Footer</h2>
		</div>
    </footer>
	<div id="gg"></div>
	<script src="/js/jquery-3.1.1.min.js"></script>
	<script src="/js/script.js"></script>
</body>
</html>