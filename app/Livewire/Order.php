<?php

namespace App\Livewire;

use App\Forms\Components\Pembayaran;
use App\Models\Order as ModelsOrder;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Select;
use Illuminate\Support\HtmlString;
use Livewire\Component;
use Livewire\Attributes\Validate;

class Order extends Component implements HasForms
{
    use InteractsWithForms;

    #[Validate('required')]
    public ?string $name;
    #[Validate('required, email')]
    public ?string $email;
    #[Validate('required, digits_between:10,20')]
    public ?int $phone;

    public ?int $total_item = 0;

    #[Validate('required')]
    public ?int $price = 0;

    #[Validate('required')]
    public $product;

    public ?string $rekening;

    #[Validate('nullable', 'image', 'mimes:jpeg,jpg,png')]
    public $image;

    public $customItem;
    public $isCustomItem = false;

    public $pembayaran;

    public $discount = false;

    public function mount(): void
    {
        $this->form->fill();
    }

    private function calculateTotalPrice(): void
    {
        if ($this->product == 'plugin') {
            $this->price = 650000;
        } elseif ($this->product == 'class') {
            $this->price = 299000;
        } elseif ($this->product == 'paket') {
            $this->price = 950000;
        }

        if ($this->discount) {
            $this->price *= 0.22; // Diskon 70%
        }
    }

    public function updatedTotalItem($value): void
    {
        $this->calculateTotalPrice();
    }

    public function getFormattedPriceProperty()
    {
        return 'Rp. ' . number_format($this->price, 0, ',', '.');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Data Pemesan')
                        ->icon('heroicon-o-user')
                        ->schema([
                            TextInput::make('name')
                                ->prefixIcon('heroicon-o-user')
                                ->label('Nama Lengkap')
                                ->required(),
                            TextInput::make('email')
                                ->label('Email Address')
                                ->prefixIcon('heroicon-o-envelope')
                                ->required()
                                ->email(),
                            TextInput::make('phone')
                                ->label('WhatsApp Number')
                                ->prefix('+62')
                                ->integer()
                                ->required(),
                            Select::make('product')
                                ->label('Silahkan Pilih Jenis Produk')
                                ->placeholder('Pilih Produk Yang Ingin Dibeli')
                                ->options([
                                    'plugin' => "Elementor Pro",
                                    'class' => "Bootcamp",
                                    'paket' => "Bootcamp dan Elementor Pro"
                                ])
                                ->reactive()
                                ->afterStateUpdated(function (callable $set, $state) {
                                    $this->product = $state;
                                    $this->calculateTotalPrice();
                                }),
                            Checkbox::make('discount')
                                ->label('Gunakan Kupon')
                                ->disabled(function ($get) {
                                    return $get('product') == null;
                                })

                                ->reactive()
                                ->afterStateUpdated(function (callable $set, $state) {
                                    $this->discount = $state;
                                    $this->calculateTotalPrice();
                                }),
                        ]),
                    Wizard\Step::make('pembayaran')
                        ->icon('heroicon-o-credit-card')
                        ->schema([
                            Pembayaran::make('pembayaran')
                                ->label('Pembayaran')
                        ]),
                ])
                    ->nextAction(function (Action $action) {
                        return $action
                            ->label('Selanjutnya')
                            ->color('bg-zinc-800 text-white text-sm px-4 py-1.5 rounded-lg')
                            ->button();
                    })
                    ->submitAction(new HtmlString('<button class="bg-blue-800 text-white text-sm px-4 py-1.5 rounded-lg" type="submit">submit</button>'))
            ]);
    }

    public function create(): void
    {
        ModelsOrder::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'price' => $this->price,
            'status' => 'pending',
            'total_item' => $this->total_item,
            'product' => $this->product,
            'discount' => $this->discount,
        ]);

        session(['member_name' => $this->name]);

        redirect()->to('verifikasi');
    }

    public function render()
    {
        return view('livewire.order');
    }
}
