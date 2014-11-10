<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
		<title>PHP LibDiff - Examples</title>
		<link rel="stylesheet" href="styles.css" type="text/css" charset="utf-8"/>
	</head>
	<body>
		<h1>PHP LibDiff - Examples</h1>
		<hr />
		<?php

		// Use your autoloader of choice. In this case composers.
		require 'vendor/autoload.php';

		// Include the diff class
		use PHPDiff\Diff;
		use PHPDiff\Diff\Renderer\Html\SideBySide as DiffSideBySideHtml;
		use PHPDiff\Diff\Renderer\Html\Inline as DiffInlineHtml;
		use PHPDiff\Diff\Renderer\Text\Unified as DiffUnifiedText;
		use PHPDiff\Diff\Renderer\Text\Context as DiffContextText;

		// Include two sample files for comparison
		$a = explode("\n", file_get_contents(dirname(__FILE__).'/a.txt'));
		$b = explode("\n", file_get_contents(dirname(__FILE__).'/b.txt'));

		// Options for generating the diff
		$options = array(
			//'ignoreWhitespace' => true,
			//'ignoreCase' => true,
		);

		// Initialize the diff class
		$diff = new Diff($a, $b, $options);

		?>
		<h2>Side by Side Diff</h2>
		<?php

		// Generate a side by side diff
		$renderer = new DiffSideBySideHtml;
		echo $diff->Render($renderer);

		?>
		<h2>Inline Diff</h2>
		<?php

		// Generate an inline diff
		$renderer = new DiffInlineHtml;
		echo $diff->render($renderer);

		?>
		<h2>Unified Diff</h2>
		<pre><?php

		// Generate a unified diff
		$renderer = new DiffUnifiedText;
		echo htmlspecialchars($diff->render($renderer));

		?>
		</pre>
		<h2>Context Diff</h2>
		<pre><?php

		// Generate a context diff
		$renderer = new DiffContextText;
		echo htmlspecialchars($diff->render($renderer));
		?>
		</pre>
	</body>
</html>