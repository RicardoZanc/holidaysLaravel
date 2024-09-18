// @ts-check
const { test, expect } = require('@playwright/test');

test('has title', async ({ page }) => {
  await page.goto('http://127.0.0.1:8000');

  await expect(page).toHaveTitle(/Holiday Search/);
});

test('searcching holidays as expected', async ({page}) => {
  await page.goto('http://127.0.0.1:8000');

  await page.getByTestId('year').fill('2024');
  await page.getByTestId('submit').click();
  
  await expect(page.getByRole('heading', { name: '01/01/2024' })).toBeVisible();
})

