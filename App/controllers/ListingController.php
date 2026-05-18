<?php
namespace App\Controllers;

use Framework\Database;
use Framework\Validation;

class ListingController
{
    protected $db;

    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    public function index()
    {
        $listings = $this->db->query('SELECT * FROM listings')->fetchAll();
        loadView('listings/index', ['listings' => $listings]);
    }

    public function create()
    {
        loadView('listings/create');
    }

    public function show($params)
    {
        $id = $params['id'] ?? '';
        $params = ['id' => $id];

        $listing = $this->db->query('SELECT * FROM listings WHERE id = :id', $params)->fetch();

        if (!$listing) {
            ErrorController::notFound('Listing not found');
            return;
        }

        loadView('listings/show', ['listing' => $listing]);
    }

    public function inspectAndDie($value)
    {
        echo '<pre>';
        var_dump($value);
        echo '</pre>';
        die();
    }

    public function store()
    {
        $allowedFields = [
            'title', 'description', 'salary', 'tags', 'company',
            'address', 'city', 'state', 'phone', 'email',
            'requirement', 'benefits', 'is_remote'
        ];

        $newListingData = array_intersect_key($_POST, array_flip($allowedFields));
        $newListingData['user_id'] = 1;
        $newListingData = array_map('sanitize', $newListingData);

        $errors = [];
        $requiredFields = ['title', 'description', 'email', 'city', 'state', 'salary'];

        foreach ($requiredFields as $field) {
            if (empty($newListingData[$field]) || !Validation::string($newListingData[$field], 1)) {
                $errors[$field] = ucfirst($field) . ' is required';
            }
        }

        if (!empty($errors)) {
            loadView('listings/create', [
                'errors'  => $errors,
                'listing' => $newListingData
            ]);
            return;
        }

        $fields = [];
        $values = [];

        foreach ($newListingData as $field => $value) {
            $fields[] = $field;
            if ($value === '') {
                $newListingData[$field] = null;
            }
            $values[] = ':' . $field;
        }

        $fields = implode(', ', $fields);
        $values = implode(', ', $values);

        $this->db->query(
            "INSERT INTO listings ({$fields}) VALUES ({$values})",
            $newListingData
        );

        header('Location: /listings');
        exit();
    }
    public function destroy($params)
    {
        $id = $params['id'] ?? '';

        $params = ['id' => $id];

        $listing = $this->db->query('SELECT * FROM listings WHERE id = :id', $params)->fetch();

        if (!$listing) {
            ErrorController::notFound('Listing not found');
            return;
        }

        $this->db->query('DELETE FROM listings WHERE id = :id', $params);

        $_SESSION['success_message'] = 'Listing deleted successfully';

        redirect('/listings');
    }
    public function edit($params)
    {
        $id = $params['id'] ?? '';
        $params = ['id' => $id];

        $listing = $this->db->query('SELECT * FROM listings WHERE id = :id', $params)->fetch();

        if (!$listing) {
            ErrorController::notFound('Listing not found');
            return;
        }

        loadView('listings/edit', ['listing' => $listing]);
    }
   public function update($params)
{
    $id = $params['id'] ?? '';
    $params = ['id' => $id];

    $listing = $this->db->query('SELECT * FROM listings WHERE id = :id', $params)->fetch();

    if (!$listing) {
        ErrorController::notFound('Listing not found');
        return;
    }

    $allowedFields = [
        'title', 'description', 'salary', 'tags', 'company',
        'address', 'city', 'state', 'phone', 'email',
        'requirement', 'benefits', 'is_remote'
    ];

    $updateValues = array_intersect_key($_POST, array_flip($allowedFields));
    $updateValues = array_map('sanitize', $updateValues);

    $requiredFields = ['title', 'description', 'email', 'city', 'state', 'salary'];
    $errors = [];

    foreach ($requiredFields as $field) {
        if (empty($updateValues[$field]) || !Validation::string($updateValues[$field])) {
            $errors[$field] = ucfirst($field) . ' is required';
        }
    }

    if (!empty($errors)) {
        loadView('listings/edit', [
            'listing' => $listing,
            'errors'  => $errors
        ]);
        return;
    }

    $updateFields = [];
    foreach (array_keys($updateValues) as $field) {
        $updateFields[] = "{$field} = :{$field}";
    }
    $updateFields = implode(', ', $updateFields);
    $updateQuery = "UPDATE listings SET {$updateFields} WHERE id = :id";

    $updateValues['id'] = $id; 
    $this->db->query($updateQuery, $updateValues);
    $_SESSION['success_message'] = 'Listing updated successfully';
    redirect("/listings/{$id}");
}
}