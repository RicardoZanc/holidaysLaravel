<p align="center"><img src="readmefiles/upf_logo.png"></p>



This is an tiny web aplication made with Laravel and Tailwind, with was built to attend an assignment for the college subject of Software Tests

---

# What does it do?

Since the main point of the assignment is the testing, the application was built to have a pretty simple behaviour, it consumes the [Brasil Api](https://brasilapi.com.br/) to get the holidays of the year from user input, and displays it on a page, with Brazilian fortmar date `dd/mm/yyyy`

# Assignment
Was requested that at least one of all the trhee types of tests (unit, integration and system test) was implemented into one simple app

# Tests

All the tests can be found in the `tests\` directory

## Unit

Made with [PHPUnit](https://phpunit.de/index.html), the method tested was `formatDate()` from the file `app\Http\Controllers\HolidayController.php`, witch is expected to receive a date in the format `yyyy-mm-dd` and return in the format `dd/mm/yyyy`

```php
public function testFormatDate(){
        $controller = new HolidayController();
        $dateToConvert = "2024-02-01";
        $convertedDate = $controller->formatDate($dateToConvert);
        $this->assertEquals("01/02/2024", $convertedDate);
    }
```

## Integration

Also made with [PHPUnit](https://phpunit.de/index.html), tests if the request to [Brasil Api](https://brasilapi.com.br/) had a successfull response, and if the response is an object array

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

# System

Made with [Playwright](https://playwright.dev/), was done two tests, the first one tries to acces the main page and checks if the title of the page has been correctly loaded:

```js
test('has title', async ({ page }) => {
  await page.goto('http://127.0.0.1:8000');

  await expect(page).toHaveTitle(/Holiday Search/);
});
```
The second one utilizes the main page form to search the holidays of the year of "2024" and asserts if the holiday of the day "01/01/2024" is visible:
```js
test('searcching holidays as expected', async ({page}) => {
  await page.goto('http://127.0.0.1:8000');

  await page.getByTestId('year').fill('2024');
  await page.getByTestId('submit').click();
  
  await expect(page.getByRole('heading', { name: '01/01/2024' })).toBeVisible();
})
```