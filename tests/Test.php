<?php
namespace App;

class Greeter {
	public function greet(string $name = null):string {
		if($name) {
			return "Hello, $name!";
		}

		return "Hello!";
	}
};

class GreeterTest extends \PHPUnit\Framework\TestCase {
	public function testGreeterSaysHello() {
		$greeter = new Greeter();
		self::assertStringContainsString(
			"Hello",
			$greeter->greet()
		);
	}

	public function testGreeterUsesName() {
		$greeter = new Greeter();

		self::assertStringContainsString(
			"Hello, Cody",
			$greeter->greet("Cody")
		);
		self::assertStringContainsString(
			"Hello, Sarah",
			$greeter->greet("Sarah")
		);
	}
}
?>