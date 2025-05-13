<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman utama dengan artikel dan event
     */
    public function index()
    {
        // Ambil 6 artikel terbaru
        $articles = Article::latest()->take(6)->get();
        
        // Ambil event yang akan datang (upcoming) dan sedang berlangsung (ongoing)
        $events = Event::whereIn('status', ['upcoming', 'ongoing'])
            ->orderBy('event_date', 'asc')
            ->take(4)
            ->get();
            
        return view('welcome', compact('articles', 'events'));
    }
    
    /**
     * Menampilkan detail artikel
     */
    public function showArticle($id)
    {
        $article = Article::findOrFail($id);
        return view('article-detail', compact('article'));
    }
    
    /**
     * Filter event berdasarkan kategori via AJAX
     */
    public function filterEvents(Request $request)
    {
        $query = Event::query();
        
        // Filter by category
        $category = $request->query('category');
        if ($category && in_array($category, ['A', 'B', 'C'])) {
            $query->where('category', $category);
        }
        
        // Filter by status (default: upcoming & ongoing)
        $query->whereIn('status', ['upcoming', 'ongoing']);
        
        // Sort by event date (upcoming events first)
        $events = $query->orderBy('event_date', 'asc')->get();

        return response()->json([
            'html' => view('components.event-cards', compact('events'))->render()
        ]);
    }
}