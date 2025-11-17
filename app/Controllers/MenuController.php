<?php namespace App\Controllers;

use App\Models\MenuItemModel;
use CodeIgniter\Controller;

class MenuController extends Controller
{
    // Shared model instance for this controller
    protected $menuModel;

    public function __construct()
    {
        // Initialize MenuItem model
        $this->menuModel = new MenuItemModel();
    }

    // Main menu page (loads default category on first load)
    public function index()
    {
        // Static list of categories shown on the page
        $categories = [
            ['label' => 'Coffee & Beverages', 'slug' => 'coffee-beverages'],
            ['label' => 'Pastries & Bread',   'slug' => 'pastries-bread'],
            ['label' => 'Light Bites',        'slug' => 'light-bites'],
        ];

        // Default category to show initially
        $default = 'coffee-beverages';

        // Get items belonging to the default category
        $items = $this->menuModel
            ->where('category', $default)
            ->orderBy('id', 'ASC')
            ->findAll();

        // Pass categories, current category and items to the view
        return view('menu', [
            'categories'      => $categories,
            'defaultCategory' => $default,
            'items'           => $items
        ]);
    }

    // API endpoint: returns JSON list of items for a given category slug
    public function items($slug = null)
    {
        // Validate category slug
        if (empty($slug)) {
            return $this->response
                ->setStatusCode(400)
                ->setJSON(['error' => 'Category required']);
        }

        // Fetch items matching the given category
        $items = $this->menuModel
            ->where('category', $slug)
            ->orderBy('id', 'ASC')
            ->findAll();

        // Append full image URL for each item (used by frontend JS)
        foreach ($items as &$it) {
            $it['image_url'] = !empty($it['image'])
                ? base_url('assets/img/' . $it['image'])
                : base_url('assets/img/placeholder.png');
        }

        // Return JSON response for AJAX/front-end
        return $this->response->setJSON($items);
    }
}
