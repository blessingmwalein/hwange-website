<?php

namespace App\Orchid\Screens;

use App\Models\About;
use App\Models\Contact;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;
use Illuminate\Support\Str;
use Orchid\Support\Facades\Toast;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Fields\TextArea;

class SettingsScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'about' => About::first(),
            'contacts' => Contact::defaultSort('created_at', 'desc')
                ->paginate(),
            'methods' => PaymentMethod::defaultSort('created_at', 'desc')
                ->paginate(),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Settings';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Payment Method')
                ->modal('addPaymentModal')
                ->method('addPayment')
                ->icon('plus'),
            ModalToggle::make('Contact')
                ->modal('addContactModal')
                ->method('addContact')
                ->icon('plus'),

            ModalToggle::make('Edit About')
                ->modal('editAboutModal')
                ->method('editAbout')
                ->icon('pencil')
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::tabs([
                'About' => Layout::legend('about', [
                    Sight::make('name'),
                    Sight::make('mission'),
                    Sight::make('vision'),
                    Sight::make('facebook'),
                    Sight::make('linkedin'),
                    Sight::make('whatsapp'),
                    Sight::make('address'),
                ]),
                'Contact' => Layout::table('contacts', [
                    TD::make('name', 'Name')
                        ->sort()
                        ->filter(Input::make())
                        ->render(fn (Contact $contact) => Str::limit($contact->name, 200)),
                    TD::make('email', 'Email')
                        ->sort()
                        ->filter(Input::make())
                        ->render(fn (Contact $contact) => Str::limit($contact->email, 200)),
                    TD::make('phone', 'Phone')
                        ->sort()
                        ->filter(Input::make())
                        ->render(fn (Contact $contact) => Str::limit($contact->phone, 200)),

                    TD::make(__('Actions'))
                        ->align(TD::ALIGN_CENTER)
                        ->width('100px')
                        ->render(fn (Contact $contact) => DropDown::make()
                            ->icon('options-vertical')
                            ->list([
                                ModalToggle::make('Edit')
                                    ->modal('addContactModal')
                                    ->asyncParameters(
                                        [
                                            'contact' => $contact->id,
                                        ]
                                    )
                                    ->method('addContact', [
                                        'id' => $contact->id,
                                    ])
                                    ->icon('pencil'),
                                Button::make(__('Delete'))
                                    ->icon('trash')
                                    ->confirm(__('Are you sure you want to delete this contact.'))
                                    ->method('removeContact', [
                                        'id' => $contact->id,
                                    ]),
                            ])),
                ]),
                'Payment Methods' => Layout::table('methods', [
                    TD::make('id', __('ID'))
                        ->sort()
                        ->cantHide()
                        ->filter(Input::make())
                        ->render(fn (PaymentMethod $paymentMethod) => // Please use view('path')
                        "<img src='/storage/{$paymentMethod->icon}'
                                              alt='sample'
                                              class='mw-100 d-block img-fluid rounded-1' width='50'>
                                            <span class='small text-muted mt-1 mb-0'># {$paymentMethod->id}</span>"),

                    TD::make('name', 'Name')
                        ->sort()
                        ->filter(Input::make())
                        ->render(fn (PaymentMethod $paymentMethod) => Str::limit($paymentMethod->name, 200)),


                    TD::make(__('Actions'))
                        ->align(TD::ALIGN_CENTER)
                        ->width('100px')
                        ->render(fn (PaymentMethod $paymentMethod) => DropDown::make()
                            ->icon('options-vertical')
                            ->list([
                                ModalToggle::make('Edit')
                                    ->modal('addContactModal')
                                    ->asyncParameters(
                                        [
                                            'pay$paymentMethod' => $paymentMethod->id,
                                        ]
                                    )
                                    ->method('addPayment', [
                                        'id' => $paymentMethod->id,
                                    ])
                                    ->icon('pencil'),
                                Button::make(__('Delete'))
                                    ->icon('trash')
                                    ->confirm(__('Are you sure you want to delete this method.'))
                                    ->method('removeMethod', [
                                        'id' => $paymentMethod->id,
                                    ]),
                            ])),
                ]),
            ]),
            Layout::modal('editAboutModal', [
                Layout::rows([
                    Input::make('about.name')
                        ->type('text')
                        ->max(255)
                        ->required()
                        ->title(__('Name'))
                        ->placeholder(__('Name')),

                    Input::make('about.facebook')
                        ->type('text')
                        ->required()
                        ->title(__('Facebook'))
                        ->placeholder(__('Facebook')),
                    Input::make('about.whatsapp')
                        ->type('text')
                        ->required()
                        ->title(__('Whatsapp'))
                        ->placeholder(__('Whatsapp')),
                    Input::make('about.linkedin')
                        ->type('text')
                        ->required()
                        ->title(__('Linkedin'))
                        ->placeholder(__('Linkedin')),



                    TextArea::make('about.mission')
                        ->required()
                        ->title(__('Mission'))
                        ->rows(3),

                    TextArea::make('about.vision')
                        ->title(__('Vision'))
                        ->rows(3),

                    TextArea::make('about.address')
                        ->title(__('Address'))
                        ->rows(3)

                ]),
            ])->title('Edit Product'),
            Layout::modal('addContactModal', [
                Layout::rows([
                    Input::make('contact.name')
                        ->type('text')
                        ->max(255)
                        ->required()
                        ->title(__('Name'))
                        ->placeholder(__('Name')),

                    Input::make('contact.email')
                        ->type('email')
                        ->required()
                        ->title(__('Email'))
                        ->placeholder(__('Email')),
                    Input::make('contact.phone')
                        ->type('text')
                        ->required()
                        ->title(__('Phone'))
                        ->placeholder(__('Phone')),
                ]),
            ])->title('Add Contact')
                ->async('asyncGetData'),
            Layout::modal('addPaymentModal', [
                Layout::rows([
                    Input::make('method.name')
                        ->type('text')
                        ->max(255)
                        ->required()
                        ->title(__('Name'))
                        ->placeholder(__('Name')),

                    Input::make('method.icon')
                        ->type('file')
                        ->required()
                        ->title(__('Icon')),


                ]),
            ])->title('Add Payment Method')
                ->async('asyncGetMethod'),
        ];
    }

    public function editAbout(Request $request)
    {
        $about = About::first();
        $about->fill($request->get('about'))->update();


        Toast::info(__('About was updated'));

        return redirect()->route('settings');
    }
    public function addContact(Contact $contact, Request $request)
    {
        $request->validate([
            'contact.name' => 'required',
            'contact.email' => 'required',
            'contact.phone' => 'required',
        ]);

        $contact->fill($request->get('contact'))->save();


        Toast::info(__('Contact was saved'));

        return redirect()->route('settings');
    }
    public function addPayment(PaymentMethod $paymentMethod, Request $request)
    {
        $request->validate([
            'method.name' => 'required',
            'method.icon' => 'required',
        ]);
        $url = null;

        if ($request->hasFile('method.icon')) {
            $file = $request->file('method.icon');
            $url = $file->store('payments', ['disk' => 'public']);
        }

        $paymentMethod->fill([
            'name' => $request->input('method.name'),
            'icon' => $url,
        ])->save();


        Toast::info(__('Method was saved'));

        return redirect()->route('settings');
    }

    public function removeContact(Request $request)
    {
        $contact = Contact::find($request->get('id'));
        $contact->delete();
        Toast::info(__('Contact was deleted'));
    }
    public function removeMethod(Request $request)
    {
        $method = PaymentMethod::find($request->get('id'));
        $method->delete();
        Toast::info(__('Method was deleted'));
    }

    public function asyncGetData(Contact $contact): array
    {
        return [
            'contact' => $contact,
        ];
    }

    public function asyncGetMethod(PaymentMethod $paymentMethod): array
    {
        return [
            'paymentMethod' => $paymentMethod,
        ];
    }
}
