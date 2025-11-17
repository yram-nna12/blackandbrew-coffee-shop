<?php namespace App\Controllers;

use App\Models\MenuItemModel;
use CodeIgniter\Controller;

class AdminMenuController extends Controller
{
    protected $menuModel;

    public function __construct()
    {
        helper(['form', 'url']);
        // Load MenuItemModel once for all methods
        $this->menuModel = new MenuItemModel();
    }

    // Predefined menu categories used in admin forms
    protected function categories()
    {
        return [
            ['label' => 'Coffee & Beverages', 'slug' => 'coffee-beverages'],
            ['label' => 'Pastries & Bread',   'slug' => 'pastries-bread'],
            ['label' => 'Light Bites',        'slug' => 'light-bites'],
        ];
    }

    // Display menu list with pagination and category filtering
    public function index()
    {
        $category = $this->request->getGet('category');

        // Build query sorted by ID
        $query = $this->menuModel->orderBy('id', 'ASC');

        // Apply category filter only if selected
        if (!empty($category)) {
            $query->where('category', $category);
        }

        // Pagination: 7 items per page
        $data['menu_items']       = $query->paginate(7);
        $data['pager']            = $this->menuModel->pager;
        $data['categories']       = $this->categories();
        $data['selectedCategory'] = $category ?? '';

        return view('admin/menu', $data);
    }

    // Show Add Menu Item form
    public function create()
    {
        $data['categories'] = $this->categories();
        return view('admin/add_menu_item', $data);
    }

    // Validate form, process image, store new menu item
    public function store()
    {
        $validation =  \Config\Services::validation();

        // Basic input validation
        $validation->setRules([
            'name'     => 'required|min_length[2]',
            'price'    => 'required|numeric',
            'category' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Return with old input and error message
            return redirect()->back()->withInput()->with('error', 'Please provide valid inputs.');
        }

        // Process uploaded image (resize + convert)
        $imageName = $this->processImage($this->request->getFile('image'));

        // Save new menu record
        $this->menuModel->save([
            'name'        => $this->request->getPost('name'),
            'price'       => $this->request->getPost('price'),
            'description' => $this->request->getPost('description'),
            'category'    => $this->request->getPost('category'),
            'image'       => $imageName
        ]);

        return redirect()->to('/admin/menu')->with('success', 'Menu item added!');
    }

    // Load data for edit form
    public function edit($id = null)
    {
        $item = $this->menuModel->find($id);

        // If item does not exist, redirect with error
        if (!$item) {
            return redirect()->to('/admin/menu')->with('error', 'Menu item not found.');
        }

        return view('admin/edit_menu_item', [
            'item'       => $item,
            'categories' => $this->categories()
        ]);
    }

    // Validate inputs, process optional image, then update record
    public function update($id = null)
    {
        $item = $this->menuModel->find($id);

        if (!$item) {
            return redirect()->to('/admin/menu')->with('error', 'Menu item not found.');
        }

        $validation =  \Config\Services::validation();

        // Validation rules again
        $validation->setRules([
            'name'     => 'required|min_length[2]',
            'price'    => 'required|numeric',
            'category' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('error', 'Please provide valid inputs.');
        }

        // If user uploaded a new image, process it
        $newImage = $this->processImage($this->request->getFile('image'));

        // Update record + keep old image if no new upload
        $this->menuModel->update($id, [
            'name'        => $this->request->getPost('name'),
            'price'       => $this->request->getPost('price'),
            'description' => $this->request->getPost('description'),
            'category'    => $this->request->getPost('category'),
            'image'       => $newImage ?? $item['image']
        ]);

        return redirect()->to('/admin/menu')->with('success', 'Menu item updated!');
    }

    // Delete menu record (image not deleted for safety)
    public function delete($id = null)
    {
        $item = $this->menuModel->find($id);

        if (!$item) {
            return redirect()->to('/admin/menu')->with('error', 'Menu item not found.');
        }

        $this->menuModel->delete($id);

        return redirect()->to('/admin/menu')->with('success', 'Menu item deleted!');
    }

    // Image resize + compression handler
    private function processImage($file)
    {
        // Skip if no valid upload
        if (!$file || !$file->isValid() || $file->hasMoved()) {
            return null;
        }

        $uploadDir = FCPATH . 'assets/img/';

        // Create directory if missing
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        // Generate unique filename (webp)
        $newName   = 'menu_' . uniqid() . '.webp';
        $finalPath = $uploadDir . $newName;

        // Resize image to max 800px and save with 80% quality
        \Config\Services::image()
            ->withFile($file->getTempName())
            ->resize(800, 800, true, 'auto')
            ->save($finalPath, 80);

        return $newName;
    }
}
