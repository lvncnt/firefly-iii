<?php
/**
 * GroupCollectorInterface.php
 * Copyright (c) 2019 thegrumpydictator@gmail.com
 *
 * This file is part of Firefly III.
 *
 * Firefly III is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Firefly III is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Firefly III. If not, see <http://www.gnu.org/licenses/>.
 */

declare(strict_types=1);

namespace FireflyIII\Helpers\Collector;

use Carbon\Carbon;
use FireflyIII\Models\Bill;
use FireflyIII\Models\Budget;
use FireflyIII\Models\Category;
use FireflyIII\Models\Tag;
use FireflyIII\Models\TransactionCurrency;
use FireflyIII\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

/**
 * Interface GroupCollectorInterface
 */
interface GroupCollectorInterface
{
    /**
     * Return the groups.
     *
     * @return Collection
     */
    public function getGroups(): Collection;

    /**
     * Same as getGroups but everything is in a paginator.
     *
     * @return LengthAwarePaginator
     */
    public function getPaginatedGroups(): LengthAwarePaginator;

    /**
     * Define which accounts can be part of the source and destination transactions.
     *
     * @param Collection $accounts
     *
     * @return GroupCollectorInterface
     */
    public function setAccounts(Collection $accounts): GroupCollectorInterface;

    /**
     * Limit the search to a specific bill.
     *
     * @param Bill $bill
     *
     * @return GroupCollectorInterface
     */
    public function setBill(Bill $bill): GroupCollectorInterface;

    /**
     * Limit the search to a specific budget.
     *
     * @param Budget $budget
     *
     * @return GroupCollectorInterface
     */
    public function setBudget(Budget $budget): GroupCollectorInterface;

    /**
     * Limit the search to a specific set of budgets.
     *
     * @param Collection $budgets
     *
     * @return GroupCollectorInterface
     */
    public function setBudgets(Collection $budgets): GroupCollectorInterface;

    /**
     * Limit the search to a specific category.
     *
     * @param Category $category
     *
     * @return GroupCollectorInterface
     */
    public function setCategory(Category $category): GroupCollectorInterface;

    /**
     * Limit results to a specific currency, either foreign or normal one.
     *
     * @param TransactionCurrency $currency
     *
     * @return GroupCollectorInterface
     */
    public function setCurrency(TransactionCurrency $currency): GroupCollectorInterface;

    /**
     * Limit the number of returned entries.
     *
     * @param int $limit
     *
     * @return GroupCollectorInterface
     */
    public function setLimit(int $limit): GroupCollectorInterface;

    /**
     * Set the page to get.
     *
     * @param int $page
     *
     * @return GroupCollectorInterface
     */
    public function setPage(int $page): GroupCollectorInterface;

    /**
     * Limit the result to a set of specific journals.
     *
     * @param array $journalIds
     *
     * @return GroupCollectorInterface
     */
    public function setJournalIds(array $journalIds): GroupCollectorInterface;

    /**
     * Set the start and end time of the results to return.
     *
     * @param Carbon $start
     * @param Carbon $end
     *
     * @return GroupCollectorInterface
     */
    public function setRange(Carbon $start, Carbon $end): GroupCollectorInterface;

    /**
     * Limit results to a specific tag.
     *
     * @param Tag $tag
     *
     * @return GroupCollectorInterface
     */
    public function setTag(Tag $tag): GroupCollectorInterface;

    /**
     * Limit the included transaction types.
     *
     * @param array $types
     *
     * @return GroupCollectorInterface
     */
    public function setTypes(array $types): GroupCollectorInterface;

    /**
     * Set the user object and start the query.
     *
     * @param User $user
     *
     * @return GroupCollectorInterface
     */
    public function setUser(User $user): GroupCollectorInterface;

    /**
     * Automatically include all stuff required to make API calls work.
     *
     * @return GroupCollectorInterface
     */
    public function withAPIInformation(): GroupCollectorInterface;

    /**
     * Will include the source and destination account names and types.
     *
     * @return GroupCollectorInterface
     */
    public function withAccountInformation(): GroupCollectorInterface;

    /**
     * Include bill name + ID.
     *
     * @return GroupCollectorInterface
     */
    public function withBillInformation(): GroupCollectorInterface;

    /**
     * Will include budget ID + name, if any.
     *
     * @return GroupCollectorInterface
     */
    public function withBudgetInformation(): GroupCollectorInterface;

    /**
     * Will include category ID + name, if any.
     *
     * @return GroupCollectorInterface
     */
    public function withCategoryInformation(): GroupCollectorInterface;

}