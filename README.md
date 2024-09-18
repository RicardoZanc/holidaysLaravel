
<p align="center"><img src="readmefiles/upf_logo.png" alt="UPF Logo"></p>

# Holiday Search Application

This is a small web application built using **Laravel** and **Tailwind CSS**, developed as part of an assignment for the college course **Software Testing**.

---

## Overview

The main purpose of this project is to demonstrate various types of software testing. The application consumes the [Brasil API](https://brasilapi.com.br/) to retrieve public holidays for a given year entered by the user. The holidays are then displayed in the Brazilian date format (`dd/mm/yyyy`).

## Assignment Requirements

The assignment required the implementation of at least one of each of the following test types: **unit tests**, **integration tests**, and **system tests**, all within a simple application.

---

## Tests

All tests can be found in the `tests/` directory. Below is an overview of each type of test implemented in this project.

### 1. Unit Test

Created using [PHPUnit](https://phpunit.de/index.html), this unit test checks the `formatDate()` method from `app\Http\Controllers\HolidayController.php`. The method takes a date in the format `yyyy-mm-dd` and returns it in the format `dd/mm/yyyy`.

Example test code:

```php
public function testFormatDate(){
    $controller = new HolidayController();
    $dateToConvert = "2024-02-01";
    $convertedDate = $controller->formatDate($dateToConvert);
    $this->assertEquals("01/02/2024", $convertedDate);
}
```

You can run this test with the following command:

```shell
vendor\bin\phpunit tests --colors
```

### 2. Integration Test

Also implemented with [PHPUnit](https://phpunit.de/index.html), this test checks whether the request to the [Brasil API](https://brasilapi.com.br/) is successful, and whether the response is an array of holiday objects.

Example test code:

```php
public function testApiIsResponding()
{
    $client = new Client();

    $response = $client->request('GET', 'https://brasilapi.com.br/api/feriados/v1/2024');

    $this->assertEquals(200, $response->getStatusCode());

    $responseData = json_decode($response->getBody(), true);

    $this->assertIsArray($responseData);
}
```

You can run this test with the following command:

```shell
vendor\bin\phpunit tests --colors
```

### 3. System Test

For system testing, [Playwright](https://playwright.dev/) was used. Two tests were implemented:

1. **Page Title Test**: This test verifies that the main page loads correctly by checking if the title of the page matches "Holiday Search".

```js
test('has title', async ({ page }) => {
  await page.goto('http://127.0.0.1:8000');
  await expect(page).toHaveTitle(/Holiday Search/);
});
```

2. **Holiday Search Test**: This test interacts with the main page’s form to search for holidays in the year "2024" and checks whether the holiday "01/01/2024" is displayed on the page.

```js
test('searching holidays as expected', async ({ page }) => {
  await page.goto('http://127.0.0.1:8000');

  await page.getByTestId('year').fill('2024');
  await page.getByTestId('submit').click();

  await expect(page.getByRole('heading', { name: '01/01/2024' })).toBeVisible();
});
```

You can run the Playwright tests using the command:

```shell
npx playwright test --ui
```

---

By completing this project, all three types of software testing (unit, integration, and system testing) have been applied to a functional web application.

--- 

### Technologies Used
- **Laravel**: Backend framework.
- **Tailwind CSS**: Styling framework.
- **PHPUnit**: Unit and integration testing.
- **Playwright**: System testing.
